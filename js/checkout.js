//var rate=0
function genrateFee(){
    var entry= document.getElementById("carEnt").innerHTML;
    console.log(entry);
    var exit= document.getElementById("carExitTime").value;
    console.log(exit);
    var ent= entry.split(":");
    console.log(ent);
    var ext= exit.split(":");
    console.log(ext[0]);
    var rate=(ext[0]-ent[0])*20;
    if(ext[0]-ent[0]==0){
        rate=20;
    }
    console.log(rate);
    document.getElementById("fee").setAttribute("value",rate);
}
