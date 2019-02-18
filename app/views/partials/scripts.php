<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.3/js/foundation.js"></script>
<script src="/assets/js/app.js"></script>
<script>
    $(document).ready(function() {

        $('[data-app-dashboard-toggle-shrink]').on('click', function(e) {
            e.preventDefault();
            $(this).parents('.app-dashboard').toggleClass('shrink-medium').toggleClass('shrink-large');
        });

    });
</script>

