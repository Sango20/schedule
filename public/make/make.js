var i=1;
function add(){
        var table = document.createElement("tr");
        var table1 = document.createElement("td");
        var table2 = document.createElement("td");
        var table3 = document.createElement("td");
        var table4 = document.createElement("td");
       
        var add_text = document.createElement("input");
        add_text.classList.add('box');
        add_text.type = 'text';
        add_text.name = 'title[]';
        table1.appendChild(add_text);
        table.appendChild(table1);

        var add_time = document.createElement("input");
        add_time.classList.add('box');
        add_time.name = 'time[]';
        add_time.class = "b";
        table2.appendChild(add_time);
        table.appendChild(table2);
        
        var add_contents = document.createElement("input");
        add_contents.classList.add('inline_box');
        add_contents.type = 'text';
        add_contents.name = 'content[]';
        table3.appendChild(add_contents);
        table.appendChild(table3);

        var add_button = document.createElement("input");
        add_button.classList.add('button');
        add_button.type = 'button';
        add_button.value = '削除';
        add_button.name = 'remove_' + i;
        add_button.addEventListener("click", function(){remove(this)});
        table4.appendChild(add_button);
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