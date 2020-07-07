      
</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark" style="margin-bottom: 0;">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Grzegorz Poczynajło 2019</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" 
crossorigin="anonymous"></script>

<script src="https://maps.googleapis.com/maps/api/js"></script>
<script type="text/javascript">
    jQuery(function ($) {
        // Google Maps setup
        var googlemap = new google.maps.Map(
                document.getElementById('googlemap'),
                {
                    center: new google.maps.LatLng(44.5403, -78.5463),
                    zoom: 8,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                }
        );
    });
</script>

<script>
    function clear_cart() {
        var result = confirm('Czy na pewno chcesz wyczyścić koszyk');

        if (result) {
            window.location = "<?php echo base_url(); ?>cart/remove/all";
        } else {
            return false; // cancel button
        }
    }
</script>

<script>
    $(document).ready(function () {
        $('.view').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');

            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>home/ajaxSingleProduct",
                dataType: "json",
                data: {id:id},
                success: function (data) {
                    $('#exampleModalLongTitle').text(data['name']);
                    $('.modal-body-picture').attr('src', data['photo_url']);
                    $('.modal-body-price').text(data['price'] + " PLN");
                }
            });
            /*$.post("ajax.php", function(data) {
             alert("Data: " + data); 
             });*/
            /*$.ajax({
             type: "POST",
             data: 'dataString='+id,
             success: function(data) {
             alert('test');
             }
             });*/

            $('#exampleModalCenter').modal("show");
        });
    });
</script>
</body>

</html>
