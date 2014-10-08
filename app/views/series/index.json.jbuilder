json.array!(@series) do |series|
  json.extract! series, :id, :title, :stitle, :photo, :podcast_photo, :body, :published, :width, :height, :scrolling, :frameborder, :playlist, :color, :autoplay, :hide_related, :show_comments, :show_user, :show_reposts
  json.url series_url(series, format: :json)
end
