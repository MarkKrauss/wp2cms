$(document).ready(function(){
	 
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
  	 * EnterKey  	 
  	$("#txtEditor").keypress(function(e) {
	    if (e.which == 13) 
	    {
	      e.preventDefault();
	      document.selection.createRange().pasteHTML("<br/>");
	    }
    });
    */
});




