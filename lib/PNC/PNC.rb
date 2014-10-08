require 'rubygems'

module PNC
  VERSION   = '1.0.0'
  DIR       = File.expand_path(File.dirname(__FILE__)) + File::SEPARATOR + 'lib' + File::SEPARATOR
end

# Adjust Load Path
$: << PNC::DIR unless $:.include? PNC::DIR

# Includes
require 'utility'
require 'sermon_series'
