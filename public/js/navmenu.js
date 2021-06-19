function showmenus() {
    $('#webmenus').empty();
    //both are assumed to have values. Any error will be returned from the server
    $.ajax({
        type: "GET",
        url: siteRoot+"manage_menumanager/showmenus",
        data: {},
        dataType: "json",
        cache: "false",
        success: function (result) {
            var total = result.length;
            if (total == 0) {
                return false;
            }
            else if (total === 1) {
                var webmenus = $('#webmenus');
                webmenus.append('<li class="dd-item" data-id="' + result[0]["id"] + '"><div class="dd-handle">' + result[0]["name"] + '<span class="pull-right">'+result[counter]["link"]+'</span></div></li>');
            }
            else if (total > 1) {
                var webmenus = $('#webmenus');
                var counter = 0;
                var elems = '';
                while (counter < total) {
                    elems = elems + '<li class="dd-item" data-id="' + result[counter]["id"] +'"><div class="dd-handle">' + result[counter]["name"] + '<span class="pull-right">'+result[counter]["link"]+'</span></div>';
                    if (counter < total - 1) {
                        if (result[counter + 1]['level'] > result[counter]['level']) {
                            elems = elems + '<ol class="dd-list">';
                        }
                        else {
                            elems = elems + '</li>';
                        }
                        if (result[counter + 1]['level'] < result[counter]['level']) {
                            elems = elems + '</ol></li>'.repeat(result[counter]['level'] - result[counter + 1]['level']);
                            // echo str_repeat('</ol></li>' . "\n",$categories[$i]['level'] - $categories[$i + 1]['level']);
                        }
                    }//if(counter<total-1){
                    else {
                        elems = elems + '</li>';
                        //  echo str_repeat('</ol></li>' . "\n", $categories[$i]['level']);
                        elems = elems + '</ol></li>'.repeat(result[counter]['level']);
                    }
                    counter++;
                }//en while
                webmenus.append(elems);
                $('#nestable').nestable();
            }
        }
    });
}