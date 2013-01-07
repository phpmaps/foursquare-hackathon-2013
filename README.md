Foursquare Hackathon Application 2013
=========================

##App Description
Mobile friendly PHP web app allowing people to create notification areas (places) so they can receive information from that area via Foursquare check-ins.

Coding was done to help focus check-ins, around activities like Surf Reports, Rental and Home Sales, Garage Sales and Meetups

In order to Authenticate and generate Foursquare tokens you must add several key ZF2 modules.
To do this install [Composer](http://getcomposer.org/).  Before running the composer script to download
this projects dependencies, that composer.json file looks like below. 


    ```json
    {
        "name": "zendframework/skeleton-application",
        "description": "Hackathon 2013!",
        "license": "BSD-3-Clause",
        "keywords": [
            "framework",
            "zf2"
        ],
        "homepage": "http://framework.zend.com/",
        "repositories": [
            {
                "type": "composer",
                "url": "http://packages.zendframework.com/"
            }
        ],
        "require": {
            "php": ">=5.3.3",
            "zendframework/zendframework": "2.*",
            "zendframework/zendservice-recaptcha": "2.*",
            "doctrine/common": ">=2.1",
            "zf-commons/zfc-base": "dev-master",
            "zf-commons/zfc-user": "dev-master",
            "socalnick/scn-social-auth": "dev-master"
        },
        "minimum-stability": "dev"
    }
    ```

Now tell composer to download all the modules used in the hackathon app by running the command:

    ```bash
    $ php composer.phar update
    ```
Make sure you run this composer script from the root of *this* cloned project (where the composer.json lives). 
 

## Requirements

* Zend Framework 2
* Experience with the [ArcGIS Javascript API](http://www.esri.com/)
* JQuery Mobile
* Bootstrap Twitter
* Foursquare API
* Geoloqi API

## Resources

* [ArcGIS for JavaScript API Resource Center](http://help.arcgis.com/en/webapi/javascript/arcgis/index.html)
* [ArcGIS Blog](http://blogs.esri.com/esri/arcgis/)
* [twitter@esri](http://twitter.com/esri)


## Screenshots

[![Globebeta Geotrigger Notifications](http://dl.dropbox.com/u/77164369/hackathon2013.png "Globebeta Geotrigger Notifications")](http://dl.dropbox.com/u/77164369/hackathon2013.png)


[![Globebeta Geotrigger Notifications](http://dl.dropbox.com/u/77164369/places.png "Globebeta Geotrigger Notifications")](http://dl.dropbox.com/u/77164369/places.png)


[![Globebeta Geotrigger Notifications](
http://dl.dropbox.com/u/77164369/splash.png "Globebeta Geotrigger Notifications")](
http://dl.dropbox.com/u/77164369/splash.png)


[![Globebeta Geotrigger Notifications](
http://dl.dropbox.com/u/77164369/checkin.png "Globebeta Geotrigger Notifications")](
http://dl.dropbox.com/u/77164369/checkin.png)


[![Globebeta Geotrigger Notifications](
http://dl.dropbox.com/u/77164369/profile.png "Globebeta Geotrigger Notifications")](
http://dl.dropbox.com/u/77164369/profile.png)


[![Globebeta Geotrigger Notifications](
http://dl.dropbox.com/u/77164369/form.png "Globebeta Geotrigger Notifications")](
http://dl.dropbox.com/u/77164369/form.png)
