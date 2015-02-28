module PNC
  module Utility
    module Filter
      
      def self.strip_tags(str)
        # Remove Opening and Closing tags
        str.gsub(/<[a-zA-Z]*>/, '').gsub(/<\/[a-zA-Z]*>/, '')
      end
      
      def self.spaces_to_dashes(str)
        str.gsub(' ', '-')
      end

      def self.remove_specialchars(str)
        #str.gsub(/[\.,!'"@#$%^&*()\/\\|+=\[\]<>`~{}?_:;]/, '')
      end

    end
  end
end