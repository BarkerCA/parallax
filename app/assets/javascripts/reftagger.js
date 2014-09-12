var refTagger = {
  settings: {
    bibleVersion: "NIV",      
    roundCorners: true,     
    customStyle : {
      heading: {
        color : "#003592"
      },
      body   : {
        color : "#555",
        moreLink : {
          color: "#77B800"
        }
      }
    }
  }
};
(function(d, t) {
  var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
  g.src = "//api.reftagger.com/v2/RefTagger.js";
  s.parentNode.insertBefore(g, s);
}(document, "script"));