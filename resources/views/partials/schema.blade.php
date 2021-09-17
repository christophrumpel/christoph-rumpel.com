<?php
echo $localBusiness = \Spatie\SchemaOrg\Schema::blog()
    ->name('Christoph Rumpel')
    ->description("Hey, I'm Christoph. I code. I write about code. I teach how I write code. I talk at conferences about how I teach to code.")
    ->image(asset('images/cr.png'))
    ->url(url('/'))
    ->toScript();
?>
