module ApplicationHelper
  def active_menu_item(loc)
    if loc == params[:controller]
      return " current-menu-item page_item current_page_item"
    end
  end
end
