var i=1;
function add(){
        var table = document.createElement("tr");
        var table1 = document.createElement("td");
        var table2 = document.createElement("td");
        var table3 = document.createElement("td");
        var table4 = document.createElement("td");
        var table5 = document.createElement("td");
       
        var a = document.createElement("input");
        a.type = 'text';
        a.id = "text[]";
        a.name = 'title[]';
        table1.appendChild(a);
        table.appendChild(table1);

        var b = document.createElement("input");
        b.type = 'text';
        b.id = i;
        b.name = 'start_time_[]';
        table2.appendChild(b);
        table.appendChild(table2);
        
        var c = document.createElement("input");
        c.type = 'text';
        c.id = i;
        c.name = 'time_[]';
        table3.appendChild(c);
        table.appendChild(table3);
        
        var d = document.createElement("input");
        d.type = 'text';
        d.id = i;
        d.name = 'contents_[]';
        table4.appendChild(d);
        table.appendChild(table4);
        
        var e = document.createElement("input");
        e.type = 'button';
        e.id = i;
        e.value = '削除';
        e.name = 'remove_[]';
        e.addEventListener("click", function(){remove(this)});
        table5.appendChild(e);
        table.appendChild(table5);

         var parent = document.getElementById('form_area');
        parent.appendChild(table);
        i++;
    }

    function remove(here){
        var here_id=here.id;
        var not_remove= "number[]";
        if(here_id==not_remove)
        {
            if(window.confirm("本当に削除しますか？")){
                var remove = here.parentNode.parentNode;
                remove.remove();
            }
        }else{
        console.log(here.name);
        var parent = document.getElementById('form_area');
        var remove = here.parentNode.parentNode;
        parent.removeChild(remove);
        }
    }