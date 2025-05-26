<div class="card customers-profile mt-2">
    <h3><?php echo $title; ?></h3>
    <div class="row">
        <div class="col-lg-12 ">
            <!-- <div class="padding20"> -->
            <div class="row  px-2">
                <div class="col-lg-12">
                    <div class="fld">
                        <label for="label" class="control-label"> <small class="req text-danger">* </small>Label</label>
                        <?php
                        if (old('label') != '') {
                            $label = old('label');
                        } else {
                            $label = '';
                        }
                        ?>
                        <input type="text" class="form-control" name="label[]" value="<?php echo $label; ?>" required>

                    </div>

                </div>

                @foreach($languages as $language)
                <div class="col-lg-12">
                    <div class="fld">
                        <label for="cat_name" class="control-label"> <small class="req text-danger">* </small>{{ $language->name }}</label>
                        <?php
                        if (old('{{$language->code}}') != '') {
                            $language_code = old('{{$language->code}}');
                        } else {
                            $language_code = '';
                        }
                        ?>
                        <input type="text" class="form-control" name="{{ $language->code }}[]" value="<?php echo $language_code; ?>" required>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        <div>
        </div>
    </div>

</div>