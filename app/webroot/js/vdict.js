function vd_noErrorMessages () { return true; }
window.onerror = vd_noErrorMessages;
if(typeof dictionaries == "undefined") 
{
	var dictionaries = "eng2vie_vie2eng_foldoc";
}
document.write("<div id='addVdictOnYourWeb' style='position: absolute;left: -300px;width: 300px;border: 1px solid black;padding: 2px;background-color: lightyellow;visibility: hidden;z-index: 100;'>VDict quick lookup</div>");
var vdict_offsetfromcursorX=12; //Customize x offset of tooltip
var vdict_offsetfromcursorY=10; //Customize y offset of tooltip
var vdict_ie=document.all;
var vdict_ns6=document.getElementById && !document.all;
var vdict_enabletip=false;
if (vdict_ie||vdict_ns6)
var vdict_tipobj=document.all? document.all["addVdictOnYourWeb"] : document.getElementById? document.getElementById("addVdictOnYourWeb") : "";

//////////////////////////////////////////
//////////////////move mouse///////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////

function vdict_positiontip(e){
		vdict_tipobj.style.left = ((window.Event) ? e.pageX : event.clientX + (document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft)) + 10 + "px";
		vdict_tipobj.style.top = ((window.Event) ? e.pageY : event.clientY + (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop)) + 10 + "px";
		vdict_tipobj.style.visibility="visible";
}
///////////////////////////////
//////////////////////////////
/////////////////////////////////////////
//var base_url = "http://dic.tienganh123.com/";
var base_url = "http://vdict.com/";
var text = "";
function calldict(word, dict ){//fast_dict.php,
	vdict_url	=	base_url+'fsearch.php?word='+word+'&dictionaries='+dict;
	str	=	"<div style='float: left; border-bottom: 1px solid #000000; background: #ffffff; width:300px;'>";
	str	+=	" <div style='float:left;'><a href='"+base_url+"' target='_blank'><img src='"+base_url+"cdn/images/small_logo.gif' border=0 /></a> <span name='vdict_dictionary_name' id='vdict_dictionary_name'></span> </div>";
	str	+=	" <div style='float:right;'><a href='#' onclick=\"doCloseVdict();return false;\"><img src='"+base_url+"cdn/images/close.gif' border=0 /></a></div>";
	str	+=	"</div>";
	str	+=	"<div>";
	str	+=	"<iframe id='myIframe' src='"+vdict_url+"' style='width: 100%; height: 200px; border: 0px;'></iframe>";
	str	+=	"</div>";
	document.getElementById('addVdictOnYourWeb').innerHTML = str;
}
function doCloseVdict()
{
	document.getElementById('addVdictOnYourWeb').innerHTML='';
	document.getElementById('addVdictOnYourWeb').style.visibility="hidden";
}

function ctrlrightclick(evt) {
	evt = (evt) ? evt : ((window.event) ? window.event : "");
	if (!evt.ctrlKey) return true
	return false;
}

function detectKey(evt) 
{
    evt = (evt) ? evt : ((window.event) ? window.event : "");
	if(evt.type == 'keydown' && ( (evt.keyCode == "A".charCodeAt(0)) || (evt.keyCode == "a".charCodeAt(0)) ) )
	{
		if ( (evt.ctrlKey) && (evt.shiftKey) )
		{
			text = (document.all) ? document.selection.createRange().text : document.getSelection();
			if (text.length > 1)
			{
				vdict_enabletip=true;
				vdict_positiontip(evt);
				calldict(text, dictionaries);
			}
		}
	}
	return true;
}
function doDblClick(evt) 
{
    evt = (evt) ? evt : ((window.event) ? window.event : "")
	text = (document.all) ? document.selection.createRange().text : document.getSelection();
	text =text+"";
	if (text.length > 1)
	{
		vdict_enabletip=true;
		vdict_positiontip(evt);
		calldict(text, dictionaries);
	}	
	return true;
}


///////////////////////////////
///////////////////////////////
///////////////////////////////
function getWordFromEvent (evt) {
  if (document.body && document.body.createTextRange) {
    var range = document.body.createTextRange();
    range.moveToPoint(evt.clientX, evt.clientY);
    range.expand('word');
    return range.text;
  }
  else if (evt.rangeParent && document.createRange) {
    var range = document.createRange();
    range.setStart(evt.rangeParent, evt.rangeOffset);
    range.setEnd(evt.rangeParent, evt.rangeOffset);
    expandRangeToWord(range);
    var word = range.toString();
    range.detach();
    return word;    
  }
  else {
    return null;
  }
}

function expandRangeToWord (range) {
  var startOfWord 	= 	/^\s\S+$/;
  var endOfWord 	= 	/^\S+\s$/;
  var whitespace 	= 	/^\s+$/;
  // if offset is inside whitespace
  range.setStart(range.startContainer, range.startOffset - 1);
  while (whitespace.test(range.toString())) {
    range.setEnd(range.endContainer, range.endOffset + 1);
    range.setStart(range.startContainer, range.startOffset + 1);
  }
  while (!startOfWord.test(range.toString())) {
    range.setStart(range.startContainer, range.startOffset - 1);
  }
  range.setStart(range.startContainer, range.startOffset + 1);
  while (!endOfWord.test(range.toString())) {
    range.setEnd(range.endContainer, range.endOffset + 1);
  }
  range.setEnd(range.endContainer, range.endOffset - 1);
  return range.toString();
}

function testSelectText(evt)
{
	evt = (evt) ? evt : ((window.event) ? window.event : "");
	text =	getWordFromEvent(evt);
	alert(text);
	vdict_enabletip=true;
	vdict_positiontip(evt);
	calldict(text, dictionaries);
}

document.ondblclick = 	doDblClick;
document.onkeydown 	= 	detectKey;