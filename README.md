#Assignment

- The resource, "widgets", must have three fields:
  - ID: An auto-incrementing integer. This field is read-only.
  - Name: A string. Required. Has a limit of 20 characters. This field is readable and writable.
  - Description: A string. Optional. Has a limit of 100 characters. This field is readable and writable.
- GET, POST, PATCH and DELETE verbs must be supported.
- The API must support input as JSON.
- Any output from the API must be in JSON.
- An index endpoint must be implemented for listing out all records. No pagination is necessary.
- An HTTP middleware must be used for authentication.
  - Users must be authorized to access any part of the resource API.
  - Authentication must be based on a bearer token header.
  - The token header value must be compared against a hashed token value, stored in an environment variable on the server. No plain-text token should be stored anywhere within the application.
- The current day of the week must be added to all responses in an "X-Day" header. This must be implemented using an HTTP middleware.
- Project dependencies must be managed using Composer.
- All backend code must be written in PHP.
- Create Smoke Testing using PHPUnit for the implementation.

