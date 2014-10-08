class CreateSeries < ActiveRecord::Migration
  def change
    create_table :series do |t|
      t.string :title
      t.string :stitle
      t.string :photo
      t.string :podcast_photo
      t.text :body
      t.boolean :published
      t.string :width
      t.string :height
      t.string :scrolling
      t.string :frameborder
      t.string :playlist
      t.string :color
      t.boolean :autoplay
      t.boolean :hide_related
      t.boolean :show_comments
      t.boolean :show_user
      t.boolean :show_reposts

      t.timestamps
    end
  end
end
