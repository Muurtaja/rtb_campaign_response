# RTB Campaign Response System

This system processes bid requests and returns the most suitable ad campaign.

## File Overview

- **index.php**: Entry point; loads campaigns, initializes `RTBHandler`, and processes bid requests.
- **data/campaigns.json**: Contains ad campaigns with details like price, country, dimensions, and creative info.
- **libs/BidRequest.php**: Parses and validates incoming bid requests.
- **libs/Campaign.php**: Represents a campaign and checks compatibility with a bid request.
- **libs/CampaignSelector.php**: Selects the best matching campaign based on bid criteria.
- **libs/RTBHandler.php**: Coordinates the process by coordinating bid request verification, campaign selection, and response generation.
- **test/RTB.postman_collection.json**: tman collection file containing predefined requests for testing the module, along with sample bid requests and expected responses.

## Workflow

1. **Request**: `index.php` receives a bid request JSON.
2. **Validation**: `BidRequest` parses the request; checks required fields.
3. **Selection**: `CampaignSelector` finds a suitable campaign by country, dimensions, and bid price.
4. **Response**: `RTBHandler` formats and returns the best matching campaign or an error if none match.

## Sample JSON Response

- **Match Found**:
  ```json
    {
        "id": "myB92gUhMdC5DUxndq3yAg",
        "campaign": {
            "campaignname": "Bangladesh_Banner_Campaign",
            "advertiser": "AdPlayTech",
            "price": 0.05,
            "creative_id": 101234,
            "image_url": "https://example.com/banners/banner_320x50.png",
            "landing_page": "https://example.com/landing_page"
        }
    }
  ```
- **No Match**:
  ```json
  { "error": "No matching campaign found" }
  ```
