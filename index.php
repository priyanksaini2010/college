<?php require_once 'include.php';?>
<html>
    <head>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        
    </head>
    <body>
        <div class="container">
            <form method="post">
                <table id="myTable" class=" table order-list">
                    <thead>
                        <tr>
                            <td>S.No.</td>
                            <td>From Station</td>
                            <td>To Station</td>
                            <td>Reciever Add</td>
                            <td>Date</td>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td class="col-sm-1">
                                1
                            </td>
                            <td class="col-sm-3">
                                <select  name="from[]" class="form-control" >
                                    <?php foreach ($stations as $key=>$station){?>
                                    <option  value="<?php echo $key;?>">
                                        <?php echo ucfirst($station);?>
                                    </option>
                                    <?php }?>
                                </select>
                            </td>
                            <td class="col-sm-3">
                                <select  name="to[]" class="form-control" >
                                    <?php foreach ($stations as $key=>$station){?>
                                    <option  value="<?php echo $key;?>">
                                        <?php echo ucfirst($station);?>
                                    </option>
                                    <?php }?>
                                </select>
                            </td>
                            <td class="col-sm-3">
                                <input type="text" name="recadd[]"  class="form-control"/>
                            </td>
                            <td class="col-sm-3">
                                <input type="text" name="date[]"  class="form-control datepicker"/>
                            </td>
                            <td class="col-sm-2"><a class="deleteRow"></a>
                                <input type="button" class="btn btn-md  btn-success" id="addrow" value="+" />
                            </td>

                        </tr>
                    </tbody>
                    <tfoot>
                    <tfoot>
                        <tr>
                            <td colspan="5" style="text-align: left;">
                                <input type="submit" class="btn btn-lg btn-block    btn-success" value="Add" />
                            </td>
                        </tr>
                        <tr>
                        </tr>
                    </tfoot>
                    </tfoot>
                </table>
            </form>

        </div>
    </body>
</html>


<script>
    $(document).ready(function () {
        $( ".datepicker" ).datepicker({"dateFormat":"yy-mm-dd"});
        var counter = 0;

        $("#addrow").on("click", function () {
            var newRow = $("<tr>");
            var cols = "";
            cols += '<td>' + (counter + 2) + '</td>';
            cols += "<td><select  name='from[]' class='form-control'>"+<?php foreach ($stations as $key=>$station){?>
                                    "<option  value='<?php echo $key;?>'>"+
                                        "<?php echo ucfirst($station);?>"+
                                    "</option>"+
                                    <?php }?>
                                +"</select></td>";
            cols += "<td><select  name='to[]' class='form-control'>"+<?php foreach ($stations as $key=>$station){?>
                                    "<option  value='<?php echo $key;?>'>"+
                                        "<?php echo ucfirst($station);?>"+
                                    "</option>"+
                                    <?php }?>
                                +"</select></td>";
           
            cols += '<td><input type="text" class="form-control" name="recadd[]"/></td>';
            cols += '<td><input type="text" class="form-control datepicker" name="date[]"/></td>';

            cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="-"></td>';
            newRow.append(cols);
            $("table.order-list").append(newRow);
            counter++;
        });



        $("table.order-list").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();
            counter -= 1
        });


    });



    function calculateRow(row) {
        var price = +row.find('input[name^="price"]').val();

    }
  
    function calculateGrandTotal() {
        var grandTotal = 0;
        $("table.order-list").find('input[name^="price"]').each(function () {
            grandTotal += +$(this).val();
        });
        $("#grandtotal").text(grandTotal.toFixed(2));
    }
    $( function() {
        $( ".datepicker" ).datepicker({"dateFormat":"yy-mm-dd"});
    } );
    $(document).on('focus',".datepicker", function(){
        $(this).datepicker();
    });
    </script>
