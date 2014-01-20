StnwDatePickerBundle
=====================

The bundles jQuery provides DatePicker to handle date input and datetime field type. The datepicker is localized according to the user’s locale.


## Installation

###  Download using composer

Require `stnw/date-picker-bundle` in your `composer.json` file:

```json
{
    "require": {
        "stnw/date-picker-bundle": "dev-master"
    }
}
```
Then run `composer.phar install` as usual.

### Step 2: Enable the bundle

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Stnw\DatePickerBundle\StnwSonataAdminDatePickerBundle(),
    );
}
```
### Step 3: Import twig fields template to your config.yml

Open the config.yml file and add a following lines (or adjust the current configuration):
```yaml
twig:
    form:
        resources:
            - 'StnwDatePickerBundle:Form:fields.html.twig'
```

### Step 4: Sonata Admin Integration

Create a new file named `layout.html.twig` inside the app/Resources/SonataAdminBundle/views/ with the following content:
``` twig
{% extends 'SonataAdminBundle::standard_layout.html.twig' %}
{% block javascripts %}
    {{ parent() }}

    <script src="{{ asset('bundles/stnwdatepicker/date_picker.js') }}"></script>
    <script type="text/javascript">
        global = {
            locale   : '{{ app.request.locale }}'
        }
    </script>
{% endblock %}
```

Then update the `sonata_admin` configuration to use this template:
```yaml
sonata_admin:
    templates:
        # default global templates
        layout:  SonataAdminBundle::layout.html.twig
```

### Step 5: How to use form types
#### Datepicker

AdminClass:

FormFields

``` php
<?php
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ...
            ->add('startDate', 'datePicker' )
            ->add('endDate', 'dateTimePicker' )
            ...
        ;
    }
```