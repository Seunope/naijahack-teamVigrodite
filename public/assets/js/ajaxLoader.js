/**
 * Created by Adewale Hammed on 4/15/2017.
 */
var data    =   new XMLHttpRequest();
data.open('GET','http://localhost:8000/general/questions/57cefe728af5f/57dfdfe8e2104/Exam');
data.onload =   function ()
{
    var myData  =   JSON.parse(data.responseText);
    console.log(myData);
};
data.send();