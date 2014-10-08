require 'test_helper'

class SeriesControllerTest < ActionController::TestCase
  setup do
    @series = series(:one)
  end

  test "should get index" do
    get :index
    assert_response :success
    assert_not_nil assigns(:series)
  end

  test "should get new" do
    get :new
    assert_response :success
  end

  test "should create series" do
    assert_difference('Series.count') do
      post :create, series: { autoplay: @series.autoplay, body: @series.body, color: @series.color, frameborder: @series.frameborder, height: @series.height, hide_related: @series.hide_related, photo: @series.photo, playlist: @series.playlist, podcast_photo: @series.podcast_photo, published: @series.published, scrolling: @series.scrolling, show_comments: @series.show_comments, show_reposts: @series.show_reposts, show_user: @series.show_user, stitle: @series.stitle, title: @series.title, width: @series.width }
    end

    assert_redirected_to series_path(assigns(:series))
  end

  test "should show series" do
    get :show, id: @series
    assert_response :success
  end

  test "should get edit" do
    get :edit, id: @series
    assert_response :success
  end

  test "should update series" do
    patch :update, id: @series, series: { autoplay: @series.autoplay, body: @series.body, color: @series.color, frameborder: @series.frameborder, height: @series.height, hide_related: @series.hide_related, photo: @series.photo, playlist: @series.playlist, podcast_photo: @series.podcast_photo, published: @series.published, scrolling: @series.scrolling, show_comments: @series.show_comments, show_reposts: @series.show_reposts, show_user: @series.show_user, stitle: @series.stitle, title: @series.title, width: @series.width }
    assert_redirected_to series_path(assigns(:series))
  end

  test "should destroy series" do
    assert_difference('Series.count', -1) do
      delete :destroy, id: @series
    end

    assert_redirected_to series_index_path
  end
end
