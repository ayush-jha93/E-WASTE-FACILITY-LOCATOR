# EcoRecycle

EcoRecycle is a modern, responsive web application designed to help users in India locate certified e-waste recycling facilities near them. It empowers individuals and businesses to dispose of electronic waste responsibly by providing a comprehensive database of recycling centers, educational resources, and environmental impact tools.

## Key Features

*   **Facility Locator:** Search for certified e-waste recycling facilities by pincode, state, or facility type.
*   **Interactive Map:** View all facilities on an interactive map powered by Leaflet.js.
*   **Educational Resources:** Access a curated library of recycling guides, videos, industry articles, and impact calculators.
*   **Local Storage Contact Form:** A functional, serverless contact form that saves messages locally in your browser.
*   **Modern UI:** A premium, fully responsive design built with Tailwind CSS, glassmorphism effects, and dynamic Lottie animations.

## Tech Stack

*   **Frontend:** HTML5, PHP, Tailwind CSS (CDN), FontAwesome
*   **Maps:** Leaflet.js, OpenStreetMap
*   **Animations:** Lottie Web
*   **Database:** JSON (`data/facilities.json`) - *No external database required!*
*   **Deployment platform support:** Vercel Serverless PHP (`vercel-php`) or traditional LAMP/LEMP stacks.

## Project Structure

```text
E_watse_Facility/
├── api/                   # PHP Serverless Entry Points (required for Vercel)
│   ├── index.php          # Home Page
│   ├── Facility.php       # Facility Locator Page
│   ├── Resources.php      # Educational Hub
│   ├── contact.php        # Contact Form
│   ├── videos.php         # Video Gallery
│   └── includes/          # Shared PHP components (header, footer)
├── assets/                # Static files
│   ├── animations/        # Lottie JSON files
│   └── img/               # Images and icons
├── data/                  # Static database
│   └── facilities.json    # Centralized facility directory
└── vercel.json            # Vercel deployment configuration
```

## Running Locally

To run this application locally, you need PHP installed on your machine.

1.  Clone the repository:
    ```bash
    git clone https://github.com/yourusername/ecorecycle.git
    cd ecorecycle
    ```
2.  Start the PHP built-in server from the root directory:
    ```bash
    php -S localhost:8000
    ```
3.  Open your browser and navigate to the `api` routes (e.g., `http://localhost:8000/api/index.php`).

## Deployment to Vercel

The easiest way to host this application is using [Vercel](https://vercel.com). The project is already configured with a `vercel.json` file that utilizes the `vercel-php` community runtime, allowing your PHP code to execute as serverless functions while instantly serving static assets via Vercel's global Edge Network.

1.  Push your code to a GitHub repository.
2.  Log in to Vercel and import your new repository.
3.  Vercel will detect the `vercel.json` configuration and build the app automatically.
4.  Your app is now live!

### Vercel Routing Note
Vercel handles the routing transparently based on `vercel.json`. When a user visits `https://your-site.vercel.app/`, they are internally routed to `/api/index.php`. Standard subdirectories like `/assets` and `/data` continue to serve statically from the root.

## Disclaimer

This represents a demo/MVP layout. The database (`facilities.json`) contains placeholder and sample data intended to demonstrate functionality.
