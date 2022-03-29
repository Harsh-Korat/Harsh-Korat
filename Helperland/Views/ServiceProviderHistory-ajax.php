<script>

$(document).ready(function() {


 $('.spinner').hide();
 $('.parent-spinner').hide();

 
ServiceProviderHistory();

     function ServiceProviderHistory() {

       $('.spinner').show();
       $('.parent-spinner').show();

         username = '';
      <?php if (isset($_SESSION['username'])) { ?>
            username = "<?php echo $_SESSION['username']; ?>";
       <?php } ?> 
 
    var number = 1;

            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=ServiceProviderHistory",
                data: {
                    
                    "username": username,
                    "number":number,
                },
                
                success: function(data) {
                   
               $('.spinner').hide();
               $('.parent-spinner').hide();

                    $("#service_history_address").html(data);
                    $('#example').DataTable();
                
                }
           });

      }


ServiceProviderHistoryModal();

     function ServiceProviderHistoryModal() {

       $('.spinner').show();
       $('.parent-spinner').show();
 
         username = '';
      <?php if (isset($_SESSION['username'])) { ?>
            username = "<?php echo $_SESSION['username']; ?>";
       <?php } ?> 

    var number = 0;

            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=ServiceProviderHistory",
                data: {
                    
                    "username": username,
                    "number":number,
                },
                
                success: function(data) {
                   
               $('.spinner').hide();
               $('.parent-spinner').hide();

                    $("#service_history_address_Modal").html(data);
                
                }
           });

      }


$('#service_history_address').on('click', '.dashboard', function() {
        var addressid1 = $(this).attr('id');


   ServiceProviderHistoryModal1();


     function ServiceProviderHistoryModal1() {

      
            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=ServiceRequestModal",
                data: {
                    
                    "addressid1": addressid1,
                },
        
                success: function(data) {
         
                $("#service_history_modal_address").html(data);

                }
           });
      }
  });


$('#service_history_address_Modal').on('click', '.dashboard', function() {
        addressid1 = $(this).attr('id');



   ServiceProviderHistoryModal2();


     function ServiceProviderHistoryModal2() {

      
            $.ajax({
                type: 'POST',
                url: "http://localhost/Helperland/?controller=Helperland&function=ServiceRequestModal",
                data: {
                    
                    "addressid1": addressid1,
                },
        
                success: function(data) {
         
                $("#service_history_modal_address").html(data);

                }
           });
      }
  });

})


</script>