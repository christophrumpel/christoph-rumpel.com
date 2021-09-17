<?php
echo $localBusiness = \Spatie\SchemaOrg\Schema::localBusiness()
    ->name('Christoph Rumpel')
    ->email('christoph@christoph-rumpel.com')
    ->toScript();
?>
