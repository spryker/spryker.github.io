---
title: Glue Backend API B2B Demo Shop reference
description: Reference for the Glue Backend API endpoints in the Spryker B2B Demo Shop.
last_updated: Jun 1, 2024
template: glue-api-storefront-guide-template
related:
  - title: Glue Backend API Marketplace B2C Demo Shop reference
    link: docs/dg/dev/glue-api/page.version/backend-glue-infrastructure/backend-api-marketplace-b2b-demo-shop-reference.html
  - title: Glue Backend API Marketplace B2B Demo Shop reference
    link: docs/dg/dev/glue-api/page.version/backend-glue-infrastructure/backend-api-marketplace-b2b-demo-shop-reference.html
  - title: Glue Backend API B2C Demo Shop reference
    link: docs/dg/dev/glue-api/page.version/backend-glue-infrastructure/backend-api-b2c-demo-shop-reference.html
---

This document is an overview of default Backend API endpoints provided by Spryker B2B Marketplace. For each endpoint, there is a URL relative to the server, request parameters, as well as the appropriate request and response data formats.

<div id="swagger-ui"></div>

{% raw %}
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/3.22.1/swagger-ui.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/3.22.1/swagger-ui-standalone-preset.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/3.22.1/swagger-ui-bundle.js"></script>
<script>
const swaggerContainer = document.getElementById('swagger-ui');
if(swaggerContainer) {
    console.log('start'); const ui = SwaggerUIBundle({
        url: 'https://spryker.s3.eu-central-1.amazonaws.com/docs/Marketplace/dev+guides/glue-api-guides/202404.0/rest-api-reference/b2b_spryker_backend_api.schema.yml',
        dom_id: '#swagger-ui', deepLinking: true, presets: [
            SwaggerUIBundle.presets.apis, SwaggerUIStandalonePreset
        ],
        enableCORS: false, layout: 'BaseLayout', supportedSubmitMethods: []
    });
    console.log(ui); window.ui = ui
}
</script>
{% endraw %}
