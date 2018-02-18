<h1>DEMO</h1>
<?php echo $html->alert_danger('This is a test '.$html->badge_info('New'));
$input = new \tools\htmlInput();
$input->id = 'firstName';
$input->label = 'First name';
echo $html->input($input);

?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="http://via.placeholder.com/350x150" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="http://via.placeholder.com/350x150" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="http://via.placeholder.com/350x150" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>



<form class="needs-validation" novalidate>
    <div class="form-row">
        <div class="col-md-4 mb-3">
        <?php
            $input = new \tools\htmlInput();
            $input->id = 'firstName';
            $input->label = 'First name';
            $input->value = 'David';
            $input->feedback_valid = 'Looks ok!';
            $input->feedback_invalid = 'This field is required';
            echo $html->input($input);
        ?>

        </div>
        <div class="col-md-4 mb-3">
            <?php
            $input = new \tools\htmlInput();
            $input->id = 'lastName';
            $input->label = 'Last name';
            $input->value = 'Madrigal Miller';
            $input->feedback_valid = 'Looks ok!';
            $input->feedback_invalid = 'This field is required';
            echo $html->input($input);
            ?>
        </div>
        <div class="col-md-4 mb-3">
            <label for="validationCustomUsername">Username</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                </div>
                <input type="text" class="form-control" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                    Please choose a username.
                </div>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationCustom03">City</label>
            <input type="text" class="form-control" id="validationCustom03" placeholder="City" required>
            <div class="invalid-feedback">
                Please provide a valid city.
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <label for="validationCustom04">State</label>
            <input type="text" class="form-control" id="validationCustom04" placeholder="State" required>
            <div class="invalid-feedback">
                Please provide a valid state.
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <label for="validationCustom05">Zip</label>
            <input type="text" class="form-control" id="validationCustom05" placeholder="Zip" required>
            <div class="invalid-feedback">
                Please provide a valid zip.
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
            <label class="form-check-label" for="invalidCheck">
                Agree to terms and conditions
            </label>
            <div class="invalid-feedback">
                You must agree before submitting.
            </div>
        </div>
    </div>
    <?php
    $textarea = new \tools\textArea();
    $textarea->label = 'Prueba de cuadro de texto:';
    $textarea->id = 'bloque-texto';
    $textarea->rows = 3;
    echo $html->textarea($textarea);

    ?>
    <button class="btn btn-primary" type="submit">Submit form</button>
</form>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>