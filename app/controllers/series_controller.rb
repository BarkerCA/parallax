class SeriesController < ApplicationController
  before_action :set_series, only: [:show]
  before_action :set_series_by_title, only: [:single]

  # GET /series
  # GET /series.json
  def index
    @series = Series.all
  end

  # GET /series/1
  # GET /series/1.json
  def show
    @soundcloud = PNC::SermonSeries.soundcloud(@series)
  end
  
  # GET /series/title/:title
  def single
    @soundcloud = PNC::SermonSeries.soundcloud(@series)
  end

  private
    # Use callbacks to share common setup or constraints between actions.
    def set_series
      @series = Series.find(params[:id])
    end
    
    def set_series_by_title
      @series = Series.find_by(stitle: params[:title])
    end
end
