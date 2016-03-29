/*
 * Setzt Cursor auf letzte Position zurück
 * */
function setCaretCharIndex(containerEl, index) {
    var charIndex = 0, stop = {};

    function traverseNodes(node) {
        if (node.nodeType == 3) {
            var nextCharIndex = charIndex + node.length;
            if (index >= charIndex && index <= nextCharIndex) {
                rangy.getSelection().collapse(node, index - charIndex);
                throw stop;
            }
            charIndex = nextCharIndex;
        }
        // Count an empty element as a single character. The list below may not be exhaustive.
        else if (node.nodeType == 1
                 && /^(input|br|img|col|area|link|meta|link|param|base|table)$/i.test(node.nodeName)) {
            charIndex += 1;
        } else {
            var child = node.firstChild;
            while (child) {
                traverseNodes(child);
                child = child.nextSibling;
            }
        }
    }
    
    try {
        traverseNodes(containerEl);
    } catch (ex) {
        if (ex != stop) {
            throw ex;
        }
    }
}

/*
 *	Bekommt die aktuelle Cursor-Position
 * */
var ie = (typeof document.selection != "undefined" && document.selection.type != "Control") && true;
var w3 = (typeof window.getSelection != "undefined") && true;
function getCaretPosition() {
	var element = $("#txtEditor").get(0);
    var caretOffset = 0;
    if (w3) {
        var ranges = window.getSelection().getRangeAt(0);
        var preCaretRange = ranges.cloneRange();
        preCaretRange.selectNodeContents(element);
        preCaretRange.setEnd(ranges.endContainer, ranges.endOffset);
        caretOffset = preCaretRange.toString().length;
    } else if (ie) {
        var textRange = document.selection.createRange();
        var preCaretTextRange = document.body.createTextRange();
        preCaretTextRange.moveToElementText(element);
        preCaretTextRange.setEndPoint("EndToEnd", textRange);
        caretOffset = preCaretTextRange.text.length;
    }
    //return caretOffset;
    $("#setPos").val(caretOffset);
}

$(document).ready(function(){
	rangy.init();
	/*
	 *	EditorLayout in div "wysiwygEditor" einfügen
	 * */
	var a = '', b = '', c = '', d = '', i, j, k, m;
    for (i = 1; i <=80; i++) { a += '<option value='+i+'>' + i + '</option>'; }
    for (j = 1; j <=10; j++) { b += '<option value='+j+'>' + j + '</option>'; }
    for (m = 1; m <=5; m++) { d += '<option value='+m+'>' + m + '</option>'; }
    
    var fontFamily = ["ArimoRegular","UbuntuRegular","CantarellRegular","NeverEnding"];
	var al = fontFamily.length;
	for (var k = 0; k < al; k++) { c +='<option>'+fontFamily[k]+'</option>';}
	
	
	$("#wysiwygEditor").html("<div class='menu'> <span id='fontf' class='btn sign'><span class='iconglyph text-family'></span></span> <span id='fonts' class='btn sign'><span class='iconglyph text-size'></span></span> <span id='fontl' class='btn sign'><span class='iconglyph text-width'></span></span> <span id='indent' class='btn markit' ><span class='iconglyph indent-left'></span></span> <span id='outdent' class='btn markit'><span class='iconglyph indent-right'></span></span> <span id='bold' class='btn btn-inverse'><span class='iconglyph text-bold'></span></span> <span id='italic' class='btn btn-inverse'><span class='iconglyph text-italic'></span></span> <span id='underline' class='btn btn-inverse'><span class='iconglyph text-underline'></span></span> <span id='strikethrough' class='btn btn-inverse'><span class='iconglyph text-strikethrough'></span></span> <span id='justifyleft' class='btn'><span class='iconglyph align-left'></span></span> <span id='justifycenter' class='btn'><span class='iconglyph align-center'></span></span> <span id='justifyright' class='btn'><span class='iconglyph align-right'></span></span> <span id='insertUnorderedList' class='btn'><span class='iconglyph unorder-list'></span></span> <span id='insertOrderedList' class='btn'><span class='iconglyph order-list'></span></span> <span id='openLink' class='btn'><span class='iconglyph set-link'></span></span> <span id='textC' class='btn'><span class='iconglyph text-color'></span></span> <span id='heading' class='btn'><span class='iconglyph text-header'></span></span> <span id='maketable' class='btn'><span class='iconglyph make-table'></span></span> <input id='setPos' type='hidden' /> <div class='colorDialog'> <div id='colorpicker'></div> <input type='text' id='color' name='color' value='#123456' /> <span class='closeDialog btn'>Close</span> <div> <span id='okFont' class='btn'><span class='iconglyph color-fg'></span></span> <span id='okBack' class='btn'><span class='iconglyph color-bg'></span></span> </div> </div> </div> <div class='tableDialog'> <p>Tabelle</p> <label>Zeilen</label><input type='text' id='zeile' value='' /> <label>Spalten</label><input type='text' id='spalte' value='' /> <span id='setTable' class='btn'>OK</span> <span class='closeDialog btn'>Close</span> </div> <div class='linkDialog'> <p>Beispiel: <span>deinlink.de</span></p> <input type='text' id='takeValue' value='deinlink.de' /> <span id='setLink' class='btn'>OK</span> <span class='closeDialog btn'>Close</span> </div> <div class='fDialog sizeDialog'> <select class='fontSize'><option>Schrift Größe</option>"+a+"</select> <span class='closeDialog btn'>Close</span> </div> <div class='fDialog letterDialog'> <select class='letterSpace'><option>Zeilenabstand</option>"+b+" </select> <span class='closeDialog btn'>Close</span> </div> <div class='fDialog familyDialog'> <select class='fontFamily input font'><option>Schrift Art</option>"+c+" </select> <span class='closeDialog btn'>Close</span> </div> <div class='fDialog headDialog'> <select class='addhead'><option>Überschrift</option>"+d+" </select> <span class='closeDialog btn'>Close</span> </div>");
	
    
   function setFocus(e){
    	window.getSelection().getRangeAt(0).startContainer;
        e.preventDefault();
    } 
    /*
     * Focus auf Textarea und bleibt beim Cursorpunkt  
     * */
    $('.menu').bind('mousedown',function(e){setFocus(e);});
    
	 //Init Colorpicker
	 $('#colorpicker').farbtastic('#color');
	 
	 /*
	  * Clone
	  * */
	 $("#txtEditor").keyup(function () {
	 	$("#body").html($("#txtEditor").html());	    
	 });
	 $(".menu").click(function () {
	 	$("#body").html($("#txtEditor").html());	    
	 });
	 
	 
	/*
	 * Adding the Span-Tag with the className
	 */
	function cssAdding(className,w){
		var html = "";
	    var w;
	    var span=document.createElement("SPAN");
	    var range=window.getSelection().getRangeAt(0);
	      if (typeof window.getSelection != "undefined") {
		        var sel = window.getSelection();
		        if (sel.rangeCount) {
		            var container = document.createElement("div");
		            for (var i = 0, len = sel.rangeCount; i < len; ++i) {
		                container.appendChild(sel.getRangeAt(i).cloneContents());
		            }
		            html = container.innerHTML;
		        }
		    } else if (typeof document.selection != "undefined") {
		        if (document.selection.type == "Text") {
		            html = document.selection.createRange().htmlText;
		        }
		    }    
	     			
		addName=className + w;
		span.className=addName;
	    span.innerHTML=html;
	    range.deleteContents();
	    range.insertNode(span);	    
	}
   
   	
	 
	/*
	 * Adding the Span-Tag with the className
	 */
	function heading(v){
	    var html = ""; var v;
	    var h=document.createElement("H"+v);
	    var range=window.getSelection().getRangeAt(0);
	      if (typeof window.getSelection != "undefined") {
		        var sel = window.getSelection();
		        if (sel.rangeCount) {
		            var container = document.createElement("div");
		            for (var i = 0, len = sel.rangeCount; i < len; ++i) {
		                container.appendChild(sel.getRangeAt(i).cloneContents());
		            }
		            html = container.innerHTML;
		        }
		    } else if (typeof document.selection != "undefined") {
		        if (document.selection.type == "Text") {
		            html = document.selection.createRange().htmlText;
		        }
		    }
		h.innerHTML=html;
	    range.deleteContents();
	    range.insertNode(h);
	}
	
	/*
	 * execCommandFunction
	 * */
	function exec(s){
		$('#'+s).click(function (){document.execCommand(s);});
	}
	exec('bold');
	exec('italic');
  	exec('underline');
	exec('strikethrough');
	exec('indent');
	exec('outdent');
    exec('insertUnorderedList');
	exec('insertOrderedList');
	
	/*
     * Text Zentrieren (Links/Mittig/Rechts)
     * */
	$('#justifyleft').click(function(){document.execCommand('justifyleft', false, null);});
	$('#justifycenter').click(function(){document.execCommand('justifycenter', false, null);});
	$('#justifyright').click(function(){document.execCommand('justifyright', false, null);});

	
	/*
     * LetterSpace
     * */
	$(".letterSpace").change(function(){
		size=$(this).val();
		cssAdding("letterSpace",size);
		$(".letterDialog").hide();
	});
	
	/*
     * FontSize
     * */
	$(".fontSize").change(function(){
		size=$(this).val();
		cssAdding("fontSize",size);
		$(".fontDialog").hide();
	});
	
	/*
	 * Font-Family
	 * */
	var fontFamily = "";
	$(".fontFamily").change(function () {  
		fontFamily = $(this).val();
    	cssAdding(fontFamily,"");
    	$(".familyDialog").hide();
    });
	
	/*
     * Add Heading
     * */
	$(".addhead").change(function(){
		size=$(this).val();
		//heading(size);
		document.execCommand('formatBlock', false, '<h'+size+'>');
		$(".headDialog").hide();
	});
	
	/*
	 * TextColor
	 * */
	$("#okFont").click(function () {
    	var fonColor = $("#color").val();
    	document.execCommand('ForeColor', false, fonColor);
    	$(".colorDialog").hide();
	});
	
	/*
	 * TextBackgroundColor
	 * */
	$("#okBack").click(function () {
    	var fonColor = $("#color").val();
    	document.execCommand('backcolor', false, fonColor);
    	$(".colorDialog").hide();
	});
	
	/*
	 * Dialoge öffnen/schliessen
	 * */
	$(".closeDialog").click(function (){$(".fDialog, .linkDialog, .colorDialog, .tableDialog").hide();});
	
	function openDialog(t,u){
		$('#'+t).click(function (){$('.'+u+'Dialog').show(); });	
	}
	openDialog('fontf','family');
	openDialog('fonts','size');
	openDialog('fontl','letter');
	openDialog('openLink','link');
	openDialog('textC','color');
	openDialog('heading','head');
	openDialog('maketable','table');
	
	/*
	 *	Link setzen
	 * */
	$("#setLink").click(function (){
		setCursor();
		var val = $("#takeValue").val();
		setLink(val);
	});
	
	function setLink(input) {
	    var sel, range, html;
	    html = "<a href='http://www."+ input +"'>"+ input +"</a>";
	    if (window.getSelection) {
	        // IE9 and non-IE
	        sel = window.getSelection();
	        if (sel.getRangeAt && sel.rangeCount) {
	            range = sel.getRangeAt(0);
	            range.deleteContents();
	
	            var el = document.createElement("div");
	            el.innerHTML = html;
	            var frag = document.createDocumentFragment(), node, lastNode;
	            while ( (node = el.firstChild) ) {
	                lastNode = frag.appendChild(node);
	            }
	            range.insertNode(frag);
	            
	            if (lastNode) {
	                range = range.cloneRange();
	                range.setStartAfter(lastNode);
	                range.collapse(true);
	                sel.removeAllRanges();
	                sel.addRange(range);
	            }
	        }
	    } else if (document.selection && document.selection.type != "Control") {
	        document.selection.createRange().pasteHTML(html);
	    }
	}
	
	/*
	 *	Tabelle setzen
	 * */
	$("#setTable").click(function (){
		setCursor();
		var i = $("#zeile").val();
		var j = $("#spalte").val();
		setTable(i,j);
	});
	function setTable(m,n) {
	    var sel, range, html;
	    var tr="";var td="";
	    var otable="<table class='oTable'>";var ctable="</table>";
	    for(j=0; j<n; j++){td +="<td></td>";}
	    for(i=0; i<m; i++){tr +="<tr>"+td+"</tr>";}
	    
	    html = otable+tr+ctable;
	    if (window.getSelection) {
	        // IE9 and non-IE
	        sel = window.getSelection();
	        if (sel.getRangeAt && sel.rangeCount) {
	            range = sel.getRangeAt(0);
	            range.deleteContents();
	
	            var el = document.createElement("div");
	            el.innerHTML = html;
	            var frag = document.createDocumentFragment(), node, lastNode;
	            while ( (node = el.firstChild) ) {
	                lastNode = frag.appendChild(node);
	            }
	            range.insertNode(frag);
	            
	            if (lastNode) {
	                range = range.cloneRange();
	                range.setStartAfter(lastNode);
	                range.collapse(true);
	                sel.removeAllRanges();
	                sel.addRange(range);
	            }
	        }
	    } else if (document.selection && document.selection.type != "Control") {
	        document.selection.createRange().pasteHTML(html);
	    }
	}
    
    /*
     * set Cursor
     * */
    function setCursor(){
    	var pos = $("#setPos").val();
   	 	setCaretCharIndex($("#txtEditor")[0], pos);
    	$("#txtEditor").focus();
    	return pos;
    }
    
    $("#txtEditor").keyup(function() {getCaretPosition();});
    $("#txtEditor").mouseup(function() {getCaretPosition();});
    
    /*
  	 * mache ein <br> statt <div>
  	 *   	 
  	$("#txtEditor").keydown(function(e) {
	    
	    if (e.keyCode === 13) {
	      // insert 2 br tags (if only one br tag is inserted the cursor won't go to the next line)
	      document.execCommand('insertHTML', false, '<br><br>');
	      // prevent the default behaviour of return key pressed
	      return false;
	    }
	  });
    */
    
    
});




