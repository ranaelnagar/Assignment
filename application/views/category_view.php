<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Select Option using Codeigniter and Ajax</title>
    <link href="<?php echo base_url().'assets/css/bootstrap.css'?>" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container">
 
      <div class="row justify-content-md-center">
        <div class="col col-lg-6">
            <h3>Category Form:</h3>
            <form>
                   <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="category" id="category" required>
                        <option value="">No Selected</option>
                        <?php foreach($category as $row):?>
                        <option value="<?php echo $row->category_id;?>"><?php echo $row->category_name;?></option>
                        <?php endforeach;?>
                    </select>
                  </div>
                  <div class="form-group">
                    <!-- <label>Sub Category</label> -->
                    <select class="form-control" id="sub_category" name="sub_category" required style="display: none">
                        <option>No Selected</option>  
                    </select>
                    <select class="form-control" id="sub_category2" style="display: none;">
                        <option>No Selected</option>
                    </select>
                  </div>
            </form>
        </div>
      </div>
 
    </div>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
    <script type="text/javascript">
        var helpers =
{
    buildDropdown: function(result, dropdown, emptyMessage)
    {
        // Remove current options
        dropdown.html('');
        // Add the empty option with the empty message
        dropdown.append('<option value="">' + emptyMessage + '</option>');
        // Check result isnt empty
        if(result != '')
        {
            // Loop through each of the results and append the option to the dropdown
            $.each(result, function(k, v) {
                dropdown.append('<option value="' + v.category_id + '">' + v.category_name + '</option>');
            });
        }
    }
}
        $(document).ready(function(){
 
            $('#category').change(function(){ 
                $("#sub_category").show();
                $("#sub_category2").hide()
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('category/get_sub_category');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        // var html = '';
                        // // html += ' <div class="form-group">';
                        // // html += '<label>Sub Category</label>';
                        // // html += '<select class="form-control" id="sub_category" name="sub_category" required>';
                        // // html += ' <option>No Selected</option>'
                        // var i;
                        // for(i=0; i<data.length; i++){
                        //     html += '<option value='+data[i].category_id+'>'+data[i].category_name+'</option>';
                        // }

                        // $('#sub_category').html(html);
                        helpers.buildDropdown(
                              data,$('#sub_category'),'Select an option'
                        );
                    }
                });


                return false;
            }); 
             
        });
        $(document).ready(function(){
 
            $('#sub_category').change(function(){ 
                $("#sub_category2").show();
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo site_url('category/get_sub_category');?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        // var html = '';
                        // // html += ' <div class="form-group">';
                        // // html += '<label>Sub Category</label>';
                        // // html += '<select class="form-control" id="sub_category" name="sub_category" required>';
                        // // html += ' <option>No Selected</option>'
                        // var i;
                        // for(i=0; i<data.length; i++){
                        //     html += '<option value='+data[i].category_id+'>'+data[i].category_name+'</option>';
                        // }

                        // $('#sub_category').html(html);
                        helpers.buildDropdown(
                              data,$('#sub_category2'),'Select an option'
                        );
                    }
                });


                return false;
            }); 
             
        });
    </script>
</body>
</html>