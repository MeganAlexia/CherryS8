

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>





        <form method="post" action="upload-target.php" enctype="multipart/form-data" novalidate class="box">
            Title:<input type="text" name="title"/>
            <br /><br />

            Destinataire(s) :<br />


            <script language="JavaScript">
                function toggle(source) {
                    checkboxes = document.getElementsByName('target');
                    for (var i = 0, n = checkboxes.length; i < n; i++) {
                        checkboxes[i].checked = source.checked;
                    }
                }

            </script>
            <script>
                $(document).ready(function () {
                    $("#datepicker").datepicker();
                    $("#datepicker2").datepicker();
                });
            </script>

            <input type="checkbox" onClick="toggle(this)" /> Sélectionner tout<br/>
            <?php
            $root = "../";
            require "../includes.php";

            use Aws\DynamoDb\Exception\DynamoDbException;

//Select all the children
            try {
                //$client = DynamoDbClientBuilder::get();
                $client = LocalDBClientBuilder::get();
                $tableName = 'Users';
                $iterator = $client->getIterator('Scan', array(
                    'TableName' => $tableName,
                    'ScanFilter' => array(
                        'type' => array(
                            'AttributeValueList' => array(
                                array('S' => 'child')
                            ),
                            'ComparisonOperator' => 'CONTAINS'
                        ),
                    )
                ));

                // Each item will contain the attributes we added
                
                foreach ($iterator as $item) {
                    // Grab the time number value
                    echo '<input type="checkbox" name="target[]" value="' . $item['email']['S'] . '"> ' . $item['firstname']['S'] . ' ' . $item['lastname']['S'] . '<br>';
                    
                    // Grab the error string value
                }
            } catch (DynamoDbException $e) {
                echo "Unable to query:\n";
                echo $e->getMessage() . "\n";
            }
            ?>
            <br />

            Date de début : <input name="firstdate" id="datepicker" /> Heure de début : <input name="firsthour" type="time"> Date de fin : <input name="lastdate" id="datepicker2" /> Heure de fin :<input name="lasthour" type="time">
            <br /><br />

            Fichier(s) à envoyer :
            <div id="drop-zone">
                Glissez les fichiers ici...
                <div id="clickHere">
                    ou cliquez ici...
                    <input type="file" name="file[]" id="file"  multiple="multiple"  onchange="myFunction()" />
                </div>
            </div>  
            <br />
            <input type="submit"  value="Envoyer"/>
        </form>
        <p id="demo"></p>
 




<script language="JavaScript">
    //Checkbox Select All
function toggle(source) {
  checkboxes = document.getElementsByName('target[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>

  <script>
      //Calendar
  $(document).ready(function() {
    $("#datepicker").datepicker();
  });
  </script>
        <script>
//dropzone
            $(function () {
                var dropZoneId = "drop-zone";
                var buttonId = "clickHere";
                var mouseOverClass = "mouse-over";

                var dropZone = $("#" + dropZoneId);
                var ooleft = dropZone.offset().left;
                var ooright = dropZone.outerWidth() + ooleft;
                var ootop = dropZone.offset().top;
                var oobottom = dropZone.outerHeight() + ootop;
                var inputFile = dropZone.find("input");
                document.getElementById(dropZoneId).addEventListener("dragover", function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    dropZone.addClass(mouseOverClass);
                    var x = e.pageX;
                    var y = e.pageY;

                    if (!(x < ooleft || x > ooright || y < ootop || y > oobottom)) {
                        inputFile.offset({top: y - 15, left: x - 100});
                    } else {
                        inputFile.offset({top: -400, left: -400});
                    }

                }, true);

                if (buttonId != "") {
                    var clickZone = $("#" + buttonId);

                    var oleft = clickZone.offset().left;
                    var oright = clickZone.outerWidth() + oleft;
                    var otop = clickZone.offset().top;
                    var obottom = clickZone.outerHeight() + otop;

                    $("#" + buttonId).mousemove(function (e) {
                        var x = e.pageX;
                        var y = e.pageY;
                        if (!(x < oleft || x > oright || y < otop || y > obottom)) {
                            inputFile.offset({top: y - 15, left: x - 160});
                        } else {
                            inputFile.offset({top: -400, left: -400});
                        }
                    });
                }

                document.getElementById(dropZoneId).addEventListener("drop", function (e) {
                    $("#" + dropZoneId).removeClass(mouseOverClass);
                }, true);

            })
        </script>
        <script>
            //Send multiple files
            function myFunction() {
                var x = document.getElementById("file");
                var txt = "";
                if ('files' in x) {
                    if (x.files.length == 0) {
                        txt = "Select one or more files.";
                    } else {
                        for (var i = 0; i < x.files.length; i++) {
                            txt += "<br><strong>Fichier n°" + (i + 1) + "</strong><br>";
                            var file = x.files[i];
                            if ('name' in file) {
                                txt += "Nom : " + file.name + "<br>";
                            }
                            if ('size' in file) {
                                txt += "Taille : " + file.size + " octets <br>";
                            }
                        }
                    }
                } else {
                    if (x.value == "") {
                        txt += "Select one or more files.";
                    } else {
                        txt += "The files property is not supported by your browser!";
                        txt += "<br>The path of the selected file: " + x.value; // If the browser does not support the files property, it will return the path of the selected file instead. 
                    }
                }
                document.getElementById("demo").innerHTML = txt;
            }
        </script>

       

