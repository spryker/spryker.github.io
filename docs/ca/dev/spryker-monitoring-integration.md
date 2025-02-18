# Spryker Monitoring Integration
The Spryker Monitoring Integration is a comprehensive product capability designed to empower customers with advanced monitoring for their applications and systems. Leveraging [OpenTelemetry](https://opentelemetry.io/), this solution enables seamless connectivity and data forwarding of telemetry data, including traces and health status metrics, to OpenTelemetry-compatible monitoring platforms. This integration facilitates near real-time tracking of application performance and monitoring of system health status.

## What is OpenTelemetry (OTel)
OpenTelemetry is an open-source framework that provides APIs, libraries, and agents for collecting traces and metrics across various applications. It standardizes the instrumentation of software to help developers monitor and improve application performance effectively. OTel allows to provide a seamless and vendor-agnostic monitoring experience, empowering customers to integrate Spryker with their preferred APM solutions while adhering to industry best practices for collecting and analyzing performance data.

## Telemetry data in scope of Spryker Monitoring Integration
The Spryker Monitoring Integration focuses on several key entities to provide comprehensive monitoring:
- **Traces and Spans**: In OpenTelemetry, a **trace** represents the journey of a single request or transaction as it moves through various components of a system, capturing the end-to-end flow. A **span** is a single operation or unit of work within a trace, containing information like the operation name, start and end times, and any relevant metadata. Together, traces and spans provide a detailed view of the interactions and performance of different parts of an application, helping to diagnose issues and optimize performance.
- **Health Status Metrics**: Monitoring the overall health of critical backing services such as the SQL Database, Message Broker, Scheduler, and key SCOS Services. This ensures continuous insight into the stability and performance of the system components. To learn more about health status metrics check out [Health Status Metrics](/docs/ca/dev/smi-health-status-metrics.md) page.

## How do I get it?
### Prerequisites
As a prerequisite, customers need to have an OpenTelemetry-compatible APM tool, which can be selected from the list of [supported vendors](https://opentelemetry.io/ecosystem/vendors/). <br>
Customers cannot use vendor-specific agents (e.g., Dynatrace agent) as part of this approach. Instead, Dynatrace and similar platforms will ingest telemetry data streamed via the OpenTelemetry Collector, which acts as a vendor-agnostic data pipeline. These platforms often provide additional proprietary features beyond raw data visualization. While vendors like DataDog, Dynatrace, and New Relic offer their own agents that are deeply integrated with their platforms and optimized for seamless data ingestion, our approach uses the OpenTelemetry Collector to remain vendor-neutral and support a wide range of APM solutions

### How to Request Spryker Monitoring Integration
To request the Spryker Monitoring Integration, customers need to submit a Change Request through the Support Portal. Follow these steps:

- Submit a Change Request: Access the Support Portal and create a new Change Request.
- Provide the following Information:
  - Endpoint: The endpoint URL of your APM tool.
  - Token: An API token that Spryker can use to configure and communicate with your APM tool.

Spryker Support will guide you through the setup process once the request is submitted.

### Instrumenting Your Application
To send telemetry data to your APM tool, your application must be instrumented using OpenTelemetry. This process ensures that the necessary data is collected and forwarded to the monitoring system of your choice.
Customers can self-serve the instrumentation by following the [instrumentation guide](/docs/dg/dev/integrate-and-configure/configure-services.md#how-to-instrument), but Spryker also offers expert services to assist with this setup. If you require professional support, please contact your sales representative for further assistance.

> [!NOTE]
>This solution only supports the **OpenTelemetry Collector** for telemetry ingestion. **Proprietary vendor agents (e.g., Dynatrace, DataDog, or New Relic agents) are not supported**. Instead, these platforms ingest telemetry streamed through the OpenTelemetry Collector, ensuring flexibility, interoperability, and vendor >neutrality while adhering to industry-standard observability practices

## Additional information
For more information, check out our [Spryker Service Description](https://spryker.com/ssd/).
