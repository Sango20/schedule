var i=1;
function add(){
        var table = document.createElement("tr");
        var table1 = document.createElement("td");
        var table2 = document.createElement("td");
        var table3 = document.createElement("td");
        var table4 = document.createElement("td");
        var table5 = document.createElement("td");
       
        var add_text = document.createElement("input");
        add_text.classList.add('box');
        add_text.type = 'text';
        add_text.id = "text[]";
        add_text.name = 'title[]';
        table1.appendChild(add_text);
        table.appendChild(table1);

        var add_time = document.createElement("input");
        add_time.classList.add('box');
        add_time.type = 'time';
        add_time.id = i;
        add_time.name = 'start_times[]';
        table2.appendChild(add_time);
        table.appendChild(table2);
        
        var add_minutes = document.createElement("input");
        add_minutes.classList.add('box');
        add_minutes.type = 'text';
        add_minutes.id = i;
        add_minutes.name = 'times[]';
        table3.appendChild(add_minutes);
        table.appendChild(table3);
        
        var add_contents = document.createElement("input");
        add_contents.classList.add('inline_box');
        add_contents.type = 'text';
        add_contents.id = i;
        add_contents.name = 'contents[]';
        table4.appendChild(add_contents);
        table.appendChild(table4);
        
        var add_button = document.createElement("input");
        add_button.classList.add('button');
        add_button.type = 'button';
        add_button.id = i;
        add_button.value = '削除';
        add_button.name = 'remove_[]';
        add_button.addEventListener("click", function(){remove(this)});
        table5.appendChild(add_button);
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