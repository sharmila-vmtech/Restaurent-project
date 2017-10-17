<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<!-- Include Select2 CSS -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/3.5.0/select2.min.css" />

<!-- CSS to make Select2 fit in with Bootstrap 3.x -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/3.5.0/select2-bootstrap.min.css" />

<!-- Include Select2 JS -->
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/3.5.0/select2.min.js"></script>

<style type="text/css">
#select2Form .form-control-feedback {
    /* To make the feedback icon visible */
    z-index: 100;
}
</style>

<form id="select2Form" method="post" class="form-horizontal">
    <div class="form-group">
        <label class="col-xs-4 control-label">Favorite color</label>
        <div class="col-xs-6">
            <select name="colors" class="form-control select2-select"
                multiple data-placeholder="Choose 2-4 colors">
                <option value="black">Black</option>
                <option value="blue">Blue</option>
                <option value="green">Green</option>
                <option value="orange">Orange</option>
                <option value="red">Red</option>
                <option value="yellow">Yellow</option>
                <option value="white">White</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-4 control-label">Favorite color using tags</label>
        <div class="col-xs-6">
            <input class="form-control" name="colors-tags"
                   multiple data-placeholder="Choose 2-4 colors" />
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-6 col-xs-offset-4">
            <button type="submit" class="btn btn-default">Validate</button>
        </div>
    </div>
</form>

<script>
$(document).ready(function() {
    $('#select2Form')
        .find('[name="colors"]')
            .select2()
            // Revalidate the color when it is changed
            .change(function(e) {
                $('#select2Form').formValidation('revalidateField', 'colors');
            })
            .end()
        .find('[name="colors-tags"]')
            .select2({
                // Specify tags
                tags: ['Black', 'Blue', 'Green', 'Orange', 'Red', 'Yellow', 'White']
            })
            // Revalidate the color when it is changed
            .change(function(e) {
                $('#select2Form').formValidation('revalidateField', 'colors-tags');
            })
            .end()
        .formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                colors: {
                    validators: {
                        callback: {
                            message: 'Please choose 2-4 color you like most',
                            callback: function(value, validator, $field) {
                                // Get the selected options
                                var options = validator.getFieldElements('colors').val();
                                return (options != null && options.length >= 2 && options.length <= 4);
                            }
                        }
                    }
                },
                'colors-tags': {
                    validators: {
                        callback: {
                            message: 'Please choose 2-4 color you like most',
                            callback: function(value, validator, $field) {
                                // Get the selected options
                                var options  = validator.getFieldElements('colors-tags').val(),
                                    options2 = options.split(',');
                                return (options2 !== null && options2.length >= 2 && options2.length <= 4);
                            }
                        }
                    }
                }
            }
        });
});
</script>


</body>
</html>