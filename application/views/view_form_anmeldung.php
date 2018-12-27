<h3>
    Anmeldung
</h3>
<form method="post" action="">
    <?php echo validation_errors(); ?>
    {errorMsg}
    <div class="form-group">
        <label for="fldName">Vor- und Nachname *</label>
        <input type="name" class="form-control" id="fldName" name="name" value="<?php echo set_value('name'); ?>" placeholder="Vor- und Nachname" style="width:70%">
    </div>
    <div class="form-group">
        <label>E-Mail Adresse *</label>
        <input name="email" type="text" class="form-control" value="<?php echo set_value('email'); ?>" placeholder="E-Mail Adresse" style="width:70%" />
        <input name="email2" type="text" class="form-control" value="<?php echo set_value('email2'); ?>" placeholder="E-Mail Adresse wiederholen" style="width:70%;margin-top:5px" />
    </div>
    <div class="form-group form-inline">
        <label for="fldAdresse" style="display:block">Adresse *</label>
        <input type="text" name="strasse" class="form-control" style="width:70%"
                 value="<?php echo set_value('strasse'); ?>"
                 id="fldAdresse" placeholder="Stra&szlig;e">
        <input size="5" name="hausnummer" class="form-control"
                 value="<?php echo set_value('hausnummer'); ?>" placeholder="Nr." />
    </div>
    <div class="form-group form-inline">
        <input size="5" class="form-control" name="plz" placeholder="PLZ" maxlength="5"
                 value="<?php echo set_value('plz'); ?>" />
          <input type="text" class="form-control" name="ort" style="width:70%"
                 value="<?php echo set_value('ort'); ?>" id="fldAdresse" placeholder="Ort" />
    </div>
    <div class="form-group form-inline">
        <label style="display:block">Geburtsdatum *</label>
        <input name="geburtsdatum" type="text" class="form-control"
                 value="<?php echo set_value('geburtsdatum'); ?>"
                 size="10" maxlength="10" placeholder="TT.MM.JJJJ" /> .
    </div>
    <div class="form-group">
        <label style="display:block">
            Art des Charakters *
        </label>
        <label class="radio-inline">
            <input type="radio" id="chkNSC" name="chkNSC" value="0" <?php echo set_checkbox('chkNSC', '0'); ?> /> NSC
        </label>
        <label class="radio-inline">
            <input type="radio" id="chkSC" name="chkNSC" value="1" <?php echo set_checkbox('chkNSC', '1'); ?> /> SC
        </label>
    </div> 
    <div class="form-group">
        <label>Sonstiges</label>
        <textarea class="form-control" rows="5" style="width:70%" name="sonstiges"><?php echo set_value('sonstiges'); ?></textarea> 
    </div>         
    <div class="checkbox">
        <label>
            <input type="checkbox" name="agb"> <a href="./bilder/AGB-Runenwald-2018.pdf" target="_blank">AGBs gelesen</a> und akzeptiert *
        </label>
    </div>
    <div class="form-group">
       <div class="g-recaptcha" data-sitekey="6LcSKRgTAAAAAJivOpt_58m10FYd2Zzi3xsvO7l0"></div>
    </div>
    <div class="form-group">
    	  <input type="hidden" name="submit" value="1" />
        <button type="submit" class="btn btn-primary">Zur Veranstaltung anmelden</button>
    </div>
</form>
