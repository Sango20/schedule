var i=1;
function add(){
        var table = document.createElement("tr");
        var table1 = document.createElement("td");
        var table2 = document.createElement("td");
        var table3 = document.createElement("td");
        var table4 = document.createElement("td");
       
        var a = document.createElement("input");
        a.classList.add('b');
        a.type = 'text';
        a.name = 'title[]';
        table1.appendChild(a);
        table.appendChild(table1);

        var b = document.createElement("input");
        b.classList.add('b');
        b.name = 'time[]';
        b.class = "b";
        table2.appendChild(b);
        table.appendChild(table2);
        
        var c = document.createElement("input");
        c.classList.add('c');
        c.type = 'text';
        c.name = 'content[]';
        table3.appendChild(c);
        table.appendChild(table3);

        var d = document.createElement("input");
        d.classList.add('a');
        d.type = 'button';
        d.value = '削除';
        d.name = 'remove_' + i;
        d.addEventListener("click", function(){remove(this)});
        table4.appendChild(d);
        table.appendChild(table4);

         var parent = document.getElementById('form_area');
        parent.appendChild(table);
        i++;
    }

    function remove(here){
        var here_name=here.name;
        if(here_name=="remove_0")
        {
            console.log(here.name);
        }else{
        console.log(here.parentNode.parentNode);
        var parent = document.getElementById('form_area');
        var remove = here.parentNode.parentNode;
        parent.removeChild(remove);
        }
    }