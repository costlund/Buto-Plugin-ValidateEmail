# Buto-Plugin-ValidateEmail
Email validator due to plugin form/form_v1.

## Settings
```
items:
  email:
    type: varchar
    label: Email
    mandatory: true
    default: rs:email
    validator:
      -
        plugin: validate/email
        method: validate_email
```
