css-invert
==========

Simple command line tool to invert all the colors of a CSS file. Useful for making dark versions of light colored themes

I am someone who *hates* black text on white backgrounds. It makes me cringe, and my brain has a hard time actually focusing on text.

This was inspired by the Hacker Vision plugin, which does the same thing, only to any page on the internet. I needed a way to do this for my own web creations, as I have spent hours/days/weeks taking a default white theme for a CMS or something and manually transforming it into a dark theme, wishing so badly I could somehow save the inverted color schemes Hacker Vision so effortlessly made. Now I can, and you can too!

### Use
It's recommended to have a backup of your CSS before running this.
Let's assume that "filein.css" it the CSS file you want to invert:
```
./css-invert.php filein.css fileout.css
``` 

if that doesn't work, try it like like this:

```
php css-invert.php filein.css fileout.css
``` 
You can specify the same filename for the input and output if you want to simply overwrite the file with inverted CSS.

That's all! Your colors are all now inverted. 

### Known issues
This formats the code weird on the outputted files, and adds lots of spaces instead of line breaks where they should go.

You should run it through a beautifier like this http://html.fwpolice.com/css/

### Credit
This was adapted from code I found in a post here, after searching forever for something like this
http://stackoverflow.com/questions/2040848/automatically-convert-css-file-to-be-used-on-dark-backgrounds

Special thanks to @dgramop for making it commandline friendly
