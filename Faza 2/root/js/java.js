//Dobrosav 
var count;
function result(){
  let rate=parseFloat(document.getElementById("rate").innerHTML)
  let cnt=parseFloat(count)
  let avg=(rate+cnt)/2
  document.getElementById("rate").innerHTML=avg
}
function starmark(item){
  count=item.id[0];
  sessionStorage.starRating = count;
  var subid= item.id.substring(1);
  for(var i=0;i<5;i++){
    if(i<count)
      document.getElementById((i+1)+subid).style.color="orange";
    else
      document.getElementById((i+1)+subid).style.color="black";  
    }
}
function deleteads(){
  document.getElementById("userAds").style.visibility="hidden";
}