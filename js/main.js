 

// var mega=document.getElementById("mega");
// var menu=document.getElementById("menu") ;
// mega.addEventListener("click",function() {
//   menu.classList.toggle("showMegaMenu");
//   // mega.style.cssText="z-index:100;opacity:1";
//   });


var count=document.getElementById('valcount');
function plusfunc(price){
     
 var q= document.getElementById('quant').innerHTML;
 var q1=count.value=parseInt(q,10) + 1;
 document.getElementById('quant').innerHTML=q1;

  var p=document.getElementById('total').innerHTML ;
  var p2=parseInt(p,10) + parseInt(price,10);
  document.getElementById('total').innerHTML=p2;
}

if(parseInt(document.getElementById('valcount').value,10)===0)
{
    document.getElementById('valcount').value;
}

function minusfunc(price){
    if (parseInt(document.getElementById("quant").innerHTML,10)>1) {
        document.getElementById("quant").innerHTML-=1;
        document.getElementById("total").innerHTML-=price;
    }

}

function plusfunc2(price){
     
  var q= document.getElementById('quant').innerHTML;
  var q1=parseInt(q,10) + 1;
  document.getElementById('quant').innerHTML=q1;
 
   var p=document.getElementById('total').innerHTML ;
   var p2=parseInt(p,10) + parseInt(price,10);
   document.getElementById('total').innerHTML=p2;
 }

 function minusfunc2(price){
  if (parseInt(document.getElementById("quant").innerHTML,10)>1) {
      document.getElementById("quant").innerHTML-=1;
      document.getElementById("total").innerHTML-=price;
  }

}



