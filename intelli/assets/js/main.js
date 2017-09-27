


    


var arr_primary = {};


//var response = 'someData';

var db_table = '';
var d1,d2;


var set_primary_key = function(key,db,tab)
{
	if(arr_primary[db] == undefined)
		arr_primary[db] = {};
	if(!(arr_primary[db][tab] == key))
    	{
    		
    		arr_primary[db][tab] = key;
    	}
    console.log(arr_primary);
}

/*
var load_data = function(ev,response) 

{

console.log("resp:"+response);


}
*/


var dragstart_handler = function(db,table,ev) 
{
	 	
	 	ev.dataTransfer.setData("text", ev.target.id);
	 	db_table = db+','+table;
		// build query
        /*var query = 'SELECT * FROM '+table; 

        // create FormData
        var formData = new FormData();
        formData.append('db',db);        
        formData.append('query',query);
        */


       
        /* 

        if (window.XMLHttpRequest)
            {
              xmlhttp = new XMLHttpRequest(); // code for IE7+, Firefox, Chrome, Opera, Safari
            }
          else
            {
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); // code for IE6, IE5
            }

        xmlhttp.onreadystatechange = function()
          {
                if (xmlhttp.readyState == 1)
                {                                    
                   //NProgress.start();  // Initiate loadingBar
                  // NProgress.set(0.6);                                   
                }
              else if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                {                                    
                    response=(xmlhttp.responseText); // parsing JSON string obtained
                    console.log(JSON.parse(response));
                    //callback(ev,response);
 					//ev.dataTransfer.setData("text/plain", response);
 					//ev.dataTransfer.effectAllowed = "move";
 					
 					//ev.dropEffect = "move";
                }
           }
        
          {
            xmlhttp.open("POST","sqlLogin",true);
            xmlhttp.send(formData); // send inputs and mode.
          }

			*/

}

var dragover_handler = function(ev) 
{
 ev.preventDefault();
 // Set the dropEffect to move
 //ev.dataTransfer.dropEffect = "move";

}

 
var drop_handler = function(ev,drop_object) 
{
 var temp,primary_val;
 ev.preventDefault();
 // Get the id of the target and add the moved element to the target's DOM
 var idx = ev.dataTransfer.getData("text");
 
 	if(drop_object==1)
 		{
 			//d1 = (JSON.parse(response)).data;
 			d1 = db_table;
 			//console.log(d1);
 			temp = d1.split(",");

 			if(arr_primary[temp[0]]!=undefined)
 				{
 					$('#select_primary').show();
 					primary_val = arr_primary[temp[0]][temp[1]];
 					ev.target.innerHTML = (document.getElementById(idx).innerHTML);
 					
 					if(document.getElementById(d1)==null || document.getElementById(d1).value != primary_val)
 						$('#select_primary').append($('<option>').text(temp[1]+'.'+primary_val).attr('value',primary_val).attr('id',d1));
 					

 				}
 			else
 				alert('Select a primary key');
 			console.log(primary_val);
 		}
 	else
		{
			//d2 = (JSON.parse(response)).data;
			d2 = db_table;
 			//console.log(d1);
 			temp = d2.split(",");

 			if(arr_primary[temp[0]]!=undefined)
 				{
 					$('#select_primary').show();
 					primary_val = arr_primary[temp[0]][temp[1]];
 					ev.target.innerHTML = (document.getElementById(idx).innerHTML);
 					if(document.getElementById(d2)==null || document.getElementById(d2).value != primary_val)
 						$('#select_primary').append($('<option>').text(temp[1]+'.'+primary_val).attr('value',primary_val).attr('id',d2));
 				}
 			else
 				alert('Select a primary key');
 			console.log(primary_val);
		}

 	

}


var join_em = function()
{
	//var results_all = d1.joinWith(d2, 'id');
	
}

/*
function leftJoin(left, right, left_id, right_id) {
    var result = [];
    forEach(left, function (litem) {
        var f = _.filter(right, function (ritem) {
            return ritem[right_id] == litem[left_id];
        });
        if (f.length == 0) {
            f = [{}];
        }
        forEach(f, function (i) {
            var newObj = {};
            forEach(litem, function (v, k) {
                newObj[k + "1"] = v;
            });
            forEach(i, function (v, k) {
                newObj[k + "2"] = v;
            });
            result.push(newObj);
        });
    });
    return result;
}


*/
/*

if (!Array.prototype.joinWith) {
    +function () {
        Array.prototype.joinWith = function(that, by, select, omit) {
            var together = [], length = 0;
            if (select) select.map(function(x){select[x] = 1;});
            function fields(it) {
                var f = {}, k;
                for (k in it) {
                    if (!select) { f[k] = 1; continue; }
                    if (omit ? !select[k] : select[k]) f[k] = 1;
                }
                return f;
            }
            function add(it) {
                var pkey = '.'+it[by], pobj = {};
                if (!together[pkey]) together[pkey] = pobj,
                    together[length++] = pobj;
                pobj = together[pkey];
                for (var k in fields(it))
                    pobj[k] = it[k];
            }
            this.map(add);
            that.map(add);
            return together;
        }
    }();
}
*/