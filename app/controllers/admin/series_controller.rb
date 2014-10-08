class Admin::SeriesController < ApplicationController
  before_action :set_series, only: [:show, :edit, :update, :destroy]
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

  # GET /series/new
  def new
    @series = Series.new
  end

  # GET /series/1/edit
  def edit
  end

  # POST /series
  # POST /series.json
  def create
    @series = Series.new(series_params_mod(series_params))

    respond_to do |format|
      if @series.save
        format.html { redirect_to admin_series_index_path, notice: 'Series was successfully created.' }
        format.json { render :show, status: :created, location: @series }
      else
        format.html { render :new }
        format.json { render json: @series.errors, status: :unprocessable_entity }
      end
    end
  end

  # PATCH/PUT /series/1
  # PATCH/PUT /series/1.json
  def update
    respond_to do |format|
      if @series.update(series_params_mod(series_params))
        format.html { redirect_to admin_series_index_path, notice: 'Series was successfully updated.' }
        format.json { render :show, status: :ok, location: @series }
      else
        format.html { render :edit }
        format.json { render json: @series.errors, status: :unprocessable_entity }
      end
    end
  end

  # DELETE /series/1
  # DELETE /series/1.json
  def destroy
    @series.destroy
    respond_to do |format|
      format.html { redirect_to admin_series_index_path, notice: 'Series was successfully destroyed.' }
      format.json { head :no_content }
    end
  end

  private
    # Use callbacks to share common setup or constraints between actions.
    def set_series
      @series = Series.find(params[:id])
    end
    
    def set_series_by_title
      @series = Series.find_by(stitle: params[:title])
    end
    
    # Create URL Safe Title
    def series_params_mod(posted)
      posted[:stitle] = PNC::SermonSeries.url_format_title(posted[:title])
      posted
    end

    # Never trust parameters from the scary internet, only allow the white list through.
    def series_params
      params.require(:series).permit(:title, :stitle, :photo, :podcast_photo, :body, :published, :width, :height, :scrolling, :frameborder, :playlist, :color, :autoplay, :hide_related, :show_comments, :show_user, :show_reposts)
    end
end
