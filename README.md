Einstein
========

Blogpost : http://zainadil.com/einstein/

 ![Einstein](Screenshots/1.png "Einstein")

### What

- Site lets you find a person to teach you a particular craft
- Curated search results based on location and reviews 
- Allows "tutors" of any craft to make a public profile, display their skills,
  and receive endorsements and reviews on their teaching 
- For example, learn how to paint, play guitar, code, etc.

### Cool Features

- Search Query Processing (RegEx/Dictionary based NLP) – App processes search queries and figures out what you want to learn and where( uses your current location by default, if you don’t provide a one)
- Location based Search - Find People near you or around a certain location!
- Novel Ranking Algorithm - Curates and Ranks results based on Location, Rating, No. of Reviews, Endorsements etc
- Google Maps Integration (Results get plotted onto a Map, Images act as map markers and are strategically sized to show the top rankings)
- Profiles – Students, Tutors and Schools can set up their own profiles. Ratings are legitimate and only people paying for a service can rate, but endorsements work without any such strictness and allow your friends and followers to back you up! (Profile creation not allowed yet)
- Facebook and Twitter Integration (Login with Facebook/Twitter to endorse your friends or schools for the services they offer / share their profiles)

### Tech Stack

- MAMP
- Twitter API
- Facebook API
- Google Maps v3 API
- jQuery
- [Bootstrap iOS7](http://jasonbradley.me/bootstrap-ios7/)

### Notes

- Place repo in (OS X) - /Applications/MAMP/htdocs/Einstien
- Make a symlink to it

```bash
ln -s /Applications/MAMP/htdocs/Einstien <LINK_DIR>
```

- Landing page image source - http://www.flickr.com/photos/terryhancock/9210242042/
