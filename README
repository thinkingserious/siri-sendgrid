# A Siri API Using SendGrid

This hack was created at [MoDevEast in Washington DC](http://blog.mashery.com/content/awesome-dc-hackathon-usa-today-hq-modeveast). It was designed to be a proof of concept of how you can use the fact that Siri can send emails along with [SendGrid's Parse API](http://docs.sendgrid.com/documentation/api/parse-api-2/) to create your own custom Siri API.

When you are done with this tutorial, you will be able to ask Siri to motivate you and Siri will oblidge by calling you via Twilio to tell you "You are Awesome." :)

I hope that you take this concept to the next level and dream up interesting things for Siri to do. At the [SendGrid Mobile Hackday](http://sendgridmh.eventbrite.com/) a few developers asked Siri to check them into Foursquare, post to Twitter and remotely launch apps on their Macs.

## Getting Started

You will need a iPhone 4s, [Twilio](https://www.twilio.com/try-twilio?home-page) & [SendGrid](http://sendgrid.com/pricing.html) accounts.

## SendGrid Parse API Setup

You can find the Parse API documentation [here](http://docs.sendgrid.com/documentation/api/parse-api-2/).

First, you will need to properly setup your MX records in order to post incoming emails to a URL. Point the MX Record of the Domain/Hostname or Subdomain to mx.sendgrid.net.

Then you need to configure your Parse API settings at SendGrid [here](http://sendgrid.com/developer/reply).

I used travelsavedo.com (I set this domain name's MX records to point at mx.sendgrid.net) as the host and http://www.thinkingserious.com/siri/index.php as the URL. I did not add Spam checking.

## Setting up Siri

You will need to create an entry in your address book called SendGrid (or some other name easy to say), where the email is the one you setup with SendGrid's Parse API. Then you can say "Email SendGrid". Siri will ask you for the subject, which you can use to be your API switch. Then Siri will ask you for the contents of the body, which you can use to issue API commands.

## Code Notes

You will need to input your SendGrid and Twilio credentials where there are double brackets like so [[]].