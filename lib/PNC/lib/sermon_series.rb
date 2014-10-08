module PNC
  module SermonSeries
    VERSION = '1.0.0'
    
    def self.url_format_title(str)
      f1 = PNC::Utility::Filter.strip_tags(str)
      f2 = PNC::Utility::Filter.remove_specialchars(f1)
      f3 = PNC::Utility::Filter.spaces_to_dashes(f2)
      f3.downcase
    end
    
    def self.soundcloud(series)
      "<iframe width='#{series.width}' height='#{series.height}' scrolling='#{series.scrolling}' frameborder='#{series.frameborder}' src='https://w.soundcloud.com/player/?url=https://soundcloud.com/#{series.playlist}&color=#{series.color}&auto_play=#{series.autoplay}&hide_related=#{series.hide_related}&show_comments=#{series.show_comments}&show_user=#{series.show_user}&show_reposts=#{series.show_reposts}'></iframe>"
    end
  end
end