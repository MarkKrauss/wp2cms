$(document).ready(function(){
	
	/*
	 *	EditorLayout in div "wysiwygEditor" einfügen
	 * */
	var a = '';
	var b = '';
    var i;
    var j;
    for (i = 1; i <=10; i++) { a += '<option>' + i + '</option>'; }    
    for (j = 1; j <=10; j++) { b += '<option>' + j + '</option>'; }
	$("#wysiwygEditor").html("<div class='menu'> <span class='btn sign'><i class='icon-font'></i></span> <select class='fontFamily input font'> <option value='ArimoRegular'>Arimo</option> <option value='UbuntuRegular'>Ubuntu</option> <option value='CantarellRegular'>Cantarell </option> <option value='NeverEnding'>Ending </option> </select> <span class='btn sign'><i class='icon-text-height'> </i></span> <select class='fontSize input nmbr markit'> "+a+" </select> <span class='btn sign'><i class='icon-text-width'> </i></span> <select class='letterSpace input nmbr markit'> "+b+" </select> <span class='indent btn markit' ><i class='icon-indent-left'> </i></span> <span class='outdent btn markit'><i class='icon-indent-right'> </i></span> <span class='sel'> <span id='bold' class='btn btn-inverse OFF' ><b>B</b></span> <span id='italic' class='btn btn-inverse OFF' ><b><i>I</i></b></span> <span id='underline' class='btn btn-inverse'><b><span style='text-decoration:underline'>U</span></b></span> <span id='linethrough' class='btn btn-inverse OFF' ><b>L</b></span> </span> <span id='links' class='btn'><i class='icon-align-left'> </i></span> <span id='mitte' class='btn'><i class='icon-align-center'> </i></span> <span id='rechts' class='btn'><i class='icon-align-right'> </i></span> <span id='textC' class='btn'><b>Color</b></span> <div id='cpframe'> <div id='colorpicker'></div> <input type='text' id='color' name='color' value='#123456' /> <span id='closecpframe' class='btn'>Close</span> <div> <span id='okFont' class='btn'>TextFarbe</span> <span id='okBack' class='btn'>TextHintergrund</span> </div> </div> <span id='openLink' class='btn'><b>Link</b></span> </div> <div id='linkDialog'> <p>Beispiel: <span>deinlink.de</span></p> <input type='text' id='takeValue' value='deinlink.de' /> <span id='enterLink' class='btn' >OK</span> <span id='closeLink' class='btn'>Close</span> </div>");
	
    
    /*
     *CakePhp Bug(?). TextArea verliert den Focus wenn das Menü gedrückt wird  
     * */
    $('.menu').bind('mousedown',function(e)
    {
        window.getSelection().getRangeAt(0).startContainer;
        e.preventDefault();
    });
    
	 //Init Colorpicker
	 $('#colorpicker').farbtastic('#color');
	 //Open Colorpicker
	 $("#textC").click(function (){
	 	$("#cpframe").show();
	 });
	 //Close Colorpicker
	 $("#closecpframe").click(function (){
	 	$("#cpframe").hide();
	 });
	 
	
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
	function cssAdding(className,i){
	    var i;
	    var txt="";
	    var span=document.createElement("SPAN");
	    var range=window.getSelection().getRangeAt(0);
	    
	    if(window.getSelection){
	      txt=window.getSelection().toString();    
	    }else if(document.selection && document.selection.type!="Control"){
	      txt=document.selection.createRange().txt;
	    }	
		
		addName=className + i;
		span.className=addName;
	    span.textContent=txt;
	    range.deleteContents();
	    range.insertNode(span);	    
	}
   
   	function delAdding(){
	    var txt="";
	    var range=window.getSelection().getRangeAt(0);
	    
	    if(window.getSelection){
	      txt=window.getSelection().toString();
	    }else if(document.selection && document.selection.type!="Control"){
	      txt=document.selection.createRange().txt;
	    }
	    
		range.deleteContents();
		
		var newNode = document.createTextNode(txt);
		range.insertNode(newNode);
	}
	 
	 
	$('#delSpan').on('click', function(){
	    if (window.getSelection) {
	        area =$(this).hasClass();
	    } else if (document.selection && document.selection.type != "Control") {
	        area =$(this).hasClass();
	    }
	
	    alert(area); 
	});
  	/*
  	 *	Managing the Bold,Italic
  	 * */	
	var B = true;   //funktioniert nur im true ?!
	var I = true;
    
	$("#bold").click(function (){
		if( (B & I) == true){
   			cssAdding("bold","");
			B = false; I = true;			
		}
		else if( (B == true) & (I == false)){
			cssAdding("bolditalic","");
			B = false; I = false;
		}
		else  if( (B == false) & (I == true)){
	 	  	cssAdding("regular",""); 
			B = true; I = true;
		}
		else  {
	   		cssAdding("italic",""); 
			B = true; I = false;
		}
	});
		
	$("#italic").click(function (){
		if( (B & I) == true){
   			cssAdding("italic",""); 
			B = true; I = false;
		}
		else if( (B == true) & (I == false)){
	   		cssAdding("regular",""); 
			B = true; I = true;
		}
		else if((B == false) & (I == true)){
	   		cssAdding("bolditalic",""); 
			B = false; I = false;
		}
		else{
	   		cssAdding("bold",""); 
			B = false; I = true;
		}
	});
	
	/*
	 * Text Underline
	 * Help with execcommand
	 * */
	$('#underline').click(function(){
		document.execCommand('underline');
	});
    
    /*
     * Text Durchgestrichen
     * */
    var L = false;
	$("#linethrough").click(function(){
		cssAdding("textLineThrough","");
		L = true;
	});
	
	/*
	 *	Text Font-Family
	 * */
	var fontFamily = "ArimoRegular";

	$(".fontFamily").click(function () {  
		fontFamily = $(this).attr("value");  
    	cssAdding(fontFamily,"");
    	delAdding(fontFamily,"");
    });
    
    /*
     * Text indent/outdent
     * Help with execcommand
     * */
    $('.indent').click(function(){document.execCommand('indent');});
	$('.outdent').click(function(){document.execCommand('outdent');});
	
	/*
     * Text justify
     * Help with execcommand
     * */
	$('#links').click(function(){document.execCommand('justifyleft', false, null);});
	$('#mitte').click(function(){document.execCommand('justifycenter', false, null);});
	$('#rechts').click(function(){document.execCommand('justifyright', false, null);});

	/*
     * LetterSpace
     * */
	$(".letterSpace").change(function(){
		size=$(this).val();
		cssAdding("letterSpace",size);
	});
	
	/*
     * FontSize
     * */
	$(".fontSize").change(function(){
		size=$(this).val();
		cssAdding("fontSize",size);
	});
	
	/*
     * LineHeight
     * */
	$(".lineheight").change(function(){
		size=$(this).val();
		cssAdding("lineHeight",size);
	});
	
	/*
	 * TextColor
	 * */
	$("#okFont").click(function () {
    	var fonColor = $("#color").val();
    	document.execCommand('ForeColor', false, fonColor);
	});
	
	/*
	 * TextBackgroundColor
	 * */
	$("#okBack").click(function () {
    	var fonColor = $("#color").val();
    	document.execCommand('backcolor', false, fonColor);
	});
	
	
	/*
	 * Link setzten
	 * */
	//Dialog öffnen
	var txtEditorPos;
	$("#openLink").click(function () {
    	$("#linkDialog").show();
    	txtEditorPos=getCaretPosition(txtEditor);    	
	});
	//Dialog schliessen
	$("#closeLink").click(function () {
    	$("#linkDialog").hide(); 	
	});
	//Link eintragen und Dialog schließen
	$("#enterLink").click(function () {
		var txt = $("#takeValue").val();
		var seite= "<a href='http://www."+txt+"'>"+txt+"</a>";
		var curr = $("#txtEditor").html();
		$("#txtEditor").html([curr.slice(0, txtEditorPos), seite, curr.slice(txtEditorPos)].join(''));
		$("#linkDialog").hide();
	});
	
	/*
	 * Speichert die letzte Cursorposition im Textareafeld
	 * */
	function getCaretPosition(editableDiv) {
	  var caretPos = 0,
	    sel, range;
	  if (window.getSelection) {
	    sel = window.getSelection();
	    if (sel.rangeCount) {
	      range = sel.getRangeAt(0);
	      if (range.commonAncestorContainer.parentNode == editableDiv) {
	        caretPos = range.endOffset;
	      }
	    }
	  } else if (document.selection && document.selection.createRange) {
	    range = document.selection.createRange();
	    if (range.parentElement() == editableDiv) {
	      var tempEl = document.createElement("span");
	      editableDiv.insertBefore(tempEl, editableDiv.firstChild);
	      var tempRange = range.duplicate();
	      tempRange.moveToElementText(tempEl);
	      tempRange.setEndPoint("EndToEnd", range);
	      caretPos = tempRange.text.length;
	    }
	  }
	  return caretPos;
	}
});




