@extends('layouts.dashboard')
@section('head')

<style>

    .form-control {
        width: 100%;
    }
    .multiselect-container {
        box-shadow: 0 3px 12px rgba(0,0,0,.175);
        margin: 0;
    }
    .multiselect-container .checkbox {
        margin: 0;
    }
    .multiselect-container li {
        margin: 0;
        padding: 0;
        line-height: 0;
    }
    .multiselect-container li a {
        line-height: 25px;
        margin: 0;
        padding:0 35px;
    }
    .custom-btn {
        width: auto !important;
    }
    .custom-btn .btn, .custom-multi {
        text-align: left;
        width: auto !important;
    }
    .dropdown-menu > .active > a:hover {
        color:inherit;
    }
    
    .thumbnail {
width:150px;
height:150px;
position:relative;
}

.thumbnail img {
max-width:100%;
max-height:100%;
}

.thumbnail a {
display:block;
width:20px;
height:20px;
position:absolute;
top:3px;
right:3px;
background:white;
overflow:hidden;
text-indent:-9999px;
color:blue;
}
</style>

@endsection
@section('content')



<form method="post" class="form-horizontal" action="{{route('news.update',$news->id)}}" enctype='multipart/form-data'>
    @csrf
    @method('PUT')
    <div class="form-group" style="margin-top:20px;"><label class="col-sm-2 control-label">Main Title</label>
        <div class="col-sm-10"><input type="text" class="form-control" name="main_title" value="{{old('main_title') ? old('main_title') : $news->main_title}} "> 
            @if ($errors->has('main_title'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('main_title') }}</strong>
            </span>
            @endif   
        </div>
    </div>

    <div class="form-group" style="margin-top:20px;"><label class="col-sm-2 control-label">Sub Title</label>
        <div class="col-sm-10"><input type="text" class="form-control" name="sub_title" value="{{old('sub_title') ? old('sub_title') : $news->sub_title}}"> 
            @if ($errors->has('sub_title'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('sub_title') }}</strong>
            </span>
            @endif   
        </div>
    </div>

    <div class="hr-line-dashed"></div>
    <div class="form-group"><label class="col-sm-2 control-label">Content</label>
        <div class="col-sm-10"><textarea style = "height: auto;" type="text" id="content" class="form-control" name="content" >{{old('content') ? old('content') : $news->content}}</textarea> 
            @if ($errors->has('content'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('content')}}</strong>
            </span>
            @endif   
        </div>
    </div>

    <div class="hr-line-dashed"></div>
    <div class="form-group"><label class="col-sm-2 control-label">type</label>
        <div class="col-sm-10"> 

            <select type="string" name='type' id="type" style="width:30%;"> 

                <option value="news" >news</option>
                <option value="article">article</option>

            </select>
            @if ($errors->has('type'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('type')}}</strong>
            </span>
            @endif   
        </div>
    </div>



    <div class="hr-line-dashed"></div>
    <div class="form-group"><label class="col-sm-2 control-label">Related news</label>
        <div class="col-sm-10"> 

            <select type="text" class="multiselect" multiple="multiple" role="multiselect" name='related_news[]' id='related_news' style="width:30%;"> 


            </select>

            @if ($errors->has('related_news'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('related-news')}}</strong>
            </span>
            @endif   
        </div>
    </div>


    <div class="hr-line-dashed"></div>
    <div class="form-group"><label class="col-sm-2 control-label">Author</label>
        <div class="col-sm-10"> 

            <select type="string" name='writer_id' id="writer_id" style="width:30%;"></select>
            @if ($errors->has('writer_id'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('writer_id')}}</strong>
            </span>
            @endif   
        </div>
    </div>
    
      <div class="hr-line-dashed"></div>
    <div class="form-group"><label class="col-sm-2 control-label">Media</label>
        <div class="col-sm-10 dropzone " id="dZUpload"> 
            
            @if ($errors->has('media'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('media')}}</strong>
            </span>
            @endif   
        </div>
    </div>
    
    <input type="hidden" value="" name="media" id="media" />
    
        <div class="hr-line-dashed" id='gallery'></div>
        <div class="form-group"><label class="col-sm-2 control-label">Uploaded media</label>
            <div class="form-group" id="stored_images">
                  @foreach($news->images as $img)
                  <img src="{{asset('storage/' . $img->path)}}" class="img-square" id='img_{{$img->id}}'  style="max-height: 100px; " /><a id="delete_image" name='dlt_{{$img->id}}' onclick="deleteImage({{$img->id}})">x</a>
                @endforeach
            </div>
        </div>
                
            
            
    
  
    

    
    <div class="hr-line-dashed"></div>
    <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
            <a href="/news" class="btn btn-white">Cancel</a>
            <button class="btn btn-primary" type="submit" id="submit-all">Save changes</button>
        </div>
    </div>
    
   </form>


      
    
    

@endsection

<!-- Page-Level Scripts -->
@section('scripts')



<script type='text/javascript'>

     /**
     * bootstrap-multiselect.js
     * https://github.com/davidstutz/bootstrap-multiselect
     *
     * Copyright 2012, 2013 David Stutz
     * 
     * Dual licensed under the BSD-3-Clause and the Apache License, Version 2.0.
     */
    !function ($) {

        "use strict";// jshint ;_;

        if (typeof ko != 'undefined' && ko.bindingHandlers && !ko.bindingHandlers.multiselect) {
            ko.bindingHandlers.multiselect = {
                init: function (element, valueAccessor, allBindingsAccessor, viewModel, bindingContext) {},
                update: function (element, valueAccessor, allBindingsAccessor, viewModel, bindingContext) {
                    var ms = $(element).data('multiselect');
                    if (!ms) {
                        $(element).multiselect(ko.utils.unwrapObservable(valueAccessor()));
                    } else if (allBindingsAccessor().options && allBindingsAccessor().options().length !== ms.originalOptions.length) {
                        ms.updateOriginalOptions();
                        $(element).multiselect('rebuild');
                    }
                }
            };
        }

        function Multiselect(select, options) {

            this.options = this.mergeOptions(options);
            this.$select = $(select);

            // Initialization.
            // We have to clone to create a new reference.
            this.originalOptions = this.$select.clone()[0].options;
            this.query = '';
            this.searchTimeout = null;

            this.options.multiple = this.$select.attr('multiple') == "multiple";
            this.options.onChange = $.proxy(this.options.onChange, this);

            // Build select all if enabled.
            this.buildContainer();
            this.buildButton();
            this.buildSelectAll();
            this.buildDropdown();
            this.buildDropdownOptions();
            this.buildFilter();
            this.updateButtonText();

            this.$select.hide().after(this.$container);
        }
        ;

        Multiselect.prototype = {

            // Default options.
            defaults: {
                // Default text function will either print 'None selected' in case no
                // option is selected, or a list of the selected options up to a length of 3 selected options.
                // If more than 3 options are selected, the number of selected options is printed.
                buttonText: function (options, select) {
                    if (options.length == 0) {
                        return this.nonSelectedText + ' <b class="caret"></b>';
                    } else {

                        if (options.length > 5) {
                            return options.length + ' ' + this.nSelectedText + ' <b class="caret"></b>';
                        } else {
                            var selected = '';
                            options.each(function () {
                                var label = ($(this).attr('label') !== undefined) ? $(this).attr('label') : $(this).html();

                                //Hack by Victor Valencia R.
                                if ($(select).hasClass('multiselect-icon')) {
                                    var icon = $(this).data('icon');
                                    label = '<span class="glyphicon ' + icon + '"></span> ' + label;
                                }

                                selected += label + ', ';
                            });
                            return selected.substr(0, selected.length - 2) + ' <b class="caret"></b>';
                        }
                    }
                },
                // Like the buttonText option to update the title of the button.
                buttonTitle: function (options, select) {
                    if (options.length == 0) {
                        return this.nonSelectedText;
                    } else {
                        var selected = '';
                        options.each(function () {
                            selected += $(this).text() + ', ';
                        });
                        return selected.substr(0, selected.length - 2);
                    }
                },
                // Is triggered on change of the selected options.
                onChange: function (option, checked) {

                },
                buttonClass: 'btn',
                dropRight: false,
                selectedClass: 'active',
                buttonWidth: 'auto',
                buttonContainer: '<div class="btn-group custom-btn" />',
                // Maximum height of the dropdown menu.
                // If maximum height is exceeded a scrollbar will be displayed.
                maxHeight: false,
                includeSelectAllOption: false,
                selectAllText: ' Select all',
                selectAllValue: 'multiselect-all',
                enableFiltering: true,
                enableCaseInsensitiveFiltering: true,
                filterPlaceholder: 'Search',
                // possible options: 'text', 'value', 'both'
                filterBehavior: 'text',
                preventInputChangeEvent: false,
                nonSelectedText: 'None selected',
                nSelectedText: 'selected'
            },

            // Templates.
            templates: {
                button: '<button type="button" class="multiselect dropdown-toggle form-control" data-toggle="dropdown"></button>',
                ul: '<ul class="multiselect-container dropdown-menu custom-multi"></ul>',
                filter: '<div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span><input class="form-control multiselect-search" type="text"></div>',
                li: '<li><a href="javascript:void(0);"><label></label></a></li>',
                liGroup: '<li><label class="multiselect-group"></label></li>'
            },

            constructor: Multiselect,

            buildContainer: function () {
                this.$container = $(this.options.buttonContainer);
            },

            buildButton: function () {
                // Build button.
                this.$button = $(this.templates.button).addClass(this.options.buttonClass);

                // Adopt active state.
                if (this.$select.prop('disabled')) {
                    this.disable();
                } else {
                    this.enable();
                }

                // Manually add button width if set.
                if (this.options.buttonWidth) {
                    this.$button.css({
                        'width': this.options.buttonWidth
                    });
                }

                // Keep the tab index from the select.
                var tabindex = this.$select.attr('tabindex');
                if (tabindex) {
                    this.$button.attr('tabindex', tabindex);
                }

                this.$container.prepend(this.$button)
            },

            // Build dropdown container ul.
            buildDropdown: function () {

                // Build ul.
                this.$ul = $(this.templates.ul);

                if (this.options.dropRight) {
                    this.$ul.addClass('pull-right');
                }

                // Set max height of dropdown menu to activate auto scrollbar.
                if (this.options.maxHeight) {
                    // TODO: Add a class for this option to move the css declarations.
                    this.$ul.css({
                        'max-height': this.options.maxHeight + 'px',
                        'overflow-y': 'auto',
                        'overflow-x': 'hidden'
                    });
                }

                this.$container.append(this.$ul)
            },

            // Build the dropdown and bind event handling.
            buildDropdownOptions: function () {

                this.$select.children().each($.proxy(function (index, element) {
                    // Support optgroups and options without a group simultaneously.
                    var tag = $(element).prop('tagName').toLowerCase();
                    if (tag == 'optgroup') {
                        this.createOptgroup(element);
                    } else if (tag == 'option') {
                        this.createOptionValue(element);
                    }
                    // Other illegal tags will be ignored.
                }, this));

                // Bind the change event on the dropdown elements.
                $('li input', this.$ul).on('change', $.proxy(function (event) {
                    var checked = $(event.target).prop('checked') || false;
                    var isSelectAllOption = $(event.target).val() == this.options.selectAllValue;

                    // Apply or unapply the configured selected class.
                    if (this.options.selectedClass) {
                        if (checked) {
                            $(event.target).parents('li').addClass(this.options.selectedClass);
                        } else {
                            $(event.target).parents('li').removeClass(this.options.selectedClass);
                        }
                    }

                    // Get the corresponding option.
                    var value = $(event.target).val();
                    var $option = this.getOptionByValue(value);

                    var $optionsNotThis = $('option', this.$select).not($option);
                    var $checkboxesNotThis = $('input', this.$container).not($(event.target));

                    // Toggle all options if the select all option was changed.
                    if (isSelectAllOption) {
                        $checkboxesNotThis.filter(function () {
                            return $(this).is(':checked') != checked;
                        }).trigger('click');
                    }

                    if (checked) {
                        $option.prop('selected', true);

                        if (this.options.multiple) {
                            // Simply select additional option.
                            $option.prop('selected', true);
                        } else {
                            // Unselect all other options and corresponding checkboxes.
                            if (this.options.selectedClass) {
                                $($checkboxesNotThis).parents('li').removeClass(this.options.selectedClass);
                            }

                            $($checkboxesNotThis).prop('checked', false);
                            $optionsNotThis.prop('selected', false);

                            // It's a single selection, so close.
                            this.$button.click();
                        }

                        if (this.options.selectedClass == "active") {
                            $optionsNotThis.parents("a").css("outline", "");
                        }
                    } else {
                        // Unselect option.
                        $option.prop('selected', false);
                    }

                    this.updateButtonText();
                    this.$select.change();
                    this.options.onChange($option, checked);

                    if (this.options.preventInputChangeEvent) {
                        return false;
                    }
                }, this));

                $('li a', this.$ul).on('touchstart click', function (event) {
                    event.stopPropagation();
                    $(event.target).blur();
                });

                // Keyboard support.
                this.$container.on('keydown', $.proxy(function (event) {
                    if ($('input[type="text"]', this.$container).is(':focus')) {
                        return;
                    }
                    if ((event.keyCode == 9 || event.keyCode == 27) && this.$container.hasClass('open')) {
                        // Close on tab or escape.
                        this.$button.click();
                    } else {
                        var $items = $(this.$container).find("li:not(.divider):visible a");

                        if (!$items.length) {
                            return;
                        }

                        var index = $items.index($items.filter(':focus'));

                        // Navigation up.
                        if (event.keyCode == 38 && index > 0) {
                            index--;
                        }
                        // Navigate down.
                        else if (event.keyCode == 40 && index < $items.length - 1) {
                            index++;
                        } else if (!~index) {
                            index = 0;
                        }

                        var $current = $items.eq(index);
                        $current.focus();

                        if (event.keyCode == 32 || event.keyCode == 13) {
                            var $checkbox = $current.find('input');

                            $checkbox.prop("checked", !$checkbox.prop("checked"));
                            $checkbox.change();
                        }

                        event.stopPropagation();
                        event.preventDefault();
                    }
                }, this));
            },

            // Will build an dropdown element for the given option.
            createOptionValue: function (element) {
                if ($(element).is(':selected')) {
                    $(element).prop('selected', true);
                }

                // Support the label attribute on options.
                var label = $(element).attr('label') || $(element).html();
                var value = $(element).val();

                //Hack by Victor Valencia R.            
                if ($(element).parent().hasClass('multiselect-icon') || $(element).parent().parent().hasClass('multiselect-icon')) {
                    var icon = $(element).data('icon');
                    label = '<span class="glyphicon ' + icon + '"></span> ' + label;
                }

                var inputType = this.options.multiple ? "checkbox" : "radio";

                var $li = $(this.templates.li);
                $('label', $li).addClass(inputType);
                $('label', $li).append('<input type="' + inputType + '" />');

                //Hack by Victor Valencia R.
                if (($(element).parent().hasClass('multiselect-icon') || $(element).parent().parent().hasClass('multiselect-icon')) && inputType == 'radio') {
                    $('label', $li).css('padding-left', '0px');
                    $('label', $li).find('input').css('display', 'none');
                }

                var selected = $(element).prop('selected') || false;
                var $checkbox = $('input', $li);
                $checkbox.val(value);

                if (value == this.options.selectAllValue) {
                    $checkbox.parent().parent().addClass('multiselect-all');
                }

                $('label', $li).append(" " + label);

                this.$ul.append($li);

                if ($(element).is(':disabled')) {
                    $checkbox.attr('disabled', 'disabled').prop('disabled', true).parents('li').addClass('disabled');
                }

                $checkbox.prop('checked', selected);

                if (selected && this.options.selectedClass) {
                    $checkbox.parents('li').addClass(this.options.selectedClass);
                }
            },

            // Create optgroup.
            createOptgroup: function (group) {
                var groupName = $(group).prop('label');

                // Add a header for the group.
                var $li = $(this.templates.liGroup);
                $('label', $li).text(groupName);

                //Hack by Victor Valencia R.
                $li.addClass('text-primary');

                this.$ul.append($li);

                // Add the options of the group.
                $('option', group).each($.proxy(function (index, element) {
                    this.createOptionValue(element);
                }, this));
            },

            // Add the select all option to the select.
            buildSelectAll: function () {
                var alreadyHasSelectAll = this.$select[0][0] ? this.$select[0][0].value == this.options.selectAllValue : false;
                // If options.includeSelectAllOption === true, add the include all checkbox.
                if (this.options.includeSelectAllOption && this.options.multiple && !alreadyHasSelectAll) {
                    this.$select.prepend('<option value="' + this.options.selectAllValue + '">' + this.options.selectAllText + '</option>');
                }
            },

            // Build and bind filter.
            buildFilter: function () {

                // Build filter if filtering OR case insensitive filtering is enabled and the number of options exceeds (or equals) enableFilterLength.
                if (this.options.enableFiltering || this.options.enableCaseInsensitiveFiltering) {
                    var enableFilterLength = Math.max(this.options.enableFiltering, this.options.enableCaseInsensitiveFiltering);
                    if (this.$select.find('option').length >= enableFilterLength) {

                        this.$filter = $(this.templates.filter);
                        $('input', this.$filter).attr('placeholder', this.options.filterPlaceholder);
                        this.$ul.prepend(this.$filter);

                        this.$filter.val(this.query).on('click', function (event) {
                            event.stopPropagation();
                        }).on('keydown', $.proxy(function (event) {
                            // This is useful to catch "keydown" events after the browser has updated the control.
                            clearTimeout(this.searchTimeout);

                            this.searchTimeout = this.asyncFunction($.proxy(function () {

                                if (this.query != event.target.value) {
                                    this.query = event.target.value;

                                    $.each($('li', this.$ul), $.proxy(function (index, element) {
                                        var value = $('input', element).val();
                                        if (value != this.options.selectAllValue) {
                                            var text = $('label', element).text();
                                            var value = $('input', element).val();
                                            if (value && text && value != this.options.selectAllValue) {
                                                // by default lets assume that element is not
                                                // interesting for this search
                                                var showElement = false;

                                                var filterCandidate = '';
                                                if ((this.options.filterBehavior == 'text' || this.options.filterBehavior == 'both')) {
                                                    filterCandidate = text;
                                                }
                                                if ((this.options.filterBehavior == 'value' || this.options.filterBehavior == 'both')) {
                                                    filterCandidate = value;
                                                }

                                                if (this.options.enableCaseInsensitiveFiltering && filterCandidate.toLowerCase().indexOf(this.query.toLowerCase()) > -1) {
                                                    showElement = true;
                                                } else if (filterCandidate.indexOf(this.query) > -1) {
                                                    showElement = true;
                                                }

                                                if (showElement) {
                                                    $(element).show();
                                                } else {
                                                    $(element).hide();
                                                }
                                            }
                                        }
                                    }, this));
                                }
                            }, this), 300, this);
                        }, this));
                    }
                }
            },

            // Destroy - unbind - the plugin.
            destroy: function () {
                this.$container.remove();
                this.$select.show();
            },

            // Refreshs the checked options based on the current state of the select.
            refresh: function () {
                $('option', this.$select).each($.proxy(function (index, element) {
                    var $input = $('li input', this.$ul).filter(function () {
                        return $(this).val() == $(element).val();
                    });

                    if ($(element).is(':selected')) {
                        $input.prop('checked', true);

                        if (this.options.selectedClass) {
                            $input.parents('li').addClass(this.options.selectedClass);
                        }
                    } else {
                        $input.prop('checked', false);

                        if (this.options.selectedClass) {
                            $input.parents('li').removeClass(this.options.selectedClass);
                        }
                    }

                    if ($(element).is(":disabled")) {
                        $input.attr('disabled', 'disabled').prop('disabled', true).parents('li').addClass('disabled');
                    } else {
                        $input.prop('disabled', false).parents('li').removeClass('disabled');
                    }
                }, this));

                this.updateButtonText();
            },

            // Select an option by its value or multiple options using an array of values.
            select: function (selectValues) {
                if (selectValues && !$.isArray(selectValues)) {
                    selectValues = [selectValues];
                }

                for (var i = 0; i < selectValues.length; i++) {

                    var value = selectValues[i];

                    var $option = this.getOptionByValue(value);
                    var $checkbox = this.getInputByValue(value);

                    if (this.options.selectedClass) {
                        $checkbox.parents('li').addClass(this.options.selectedClass);
                    }

                    $checkbox.prop('checked', true);
                    $option.prop('selected', true);
                    this.options.onChange($option, true);
                }

                this.updateButtonText();
            },

            // Deselect an option by its value or using an array of values.
            deselect: function (deselectValues) {
                if (deselectValues && !$.isArray(deselectValues)) {
                    deselectValues = [deselectValues];
                }

                for (var i = 0; i < deselectValues.length; i++) {

                    var value = deselectValues[i];

                    var $option = this.getOptionByValue(value);
                    var $checkbox = this.getInputByValue(value);

                    if (this.options.selectedClass) {
                        $checkbox.parents('li').removeClass(this.options.selectedClass);
                    }

                    $checkbox.prop('checked', false);
                    $option.prop('selected', false);
                    this.options.onChange($option, false);
                }

                this.updateButtonText();
            },

            // Rebuild the whole dropdown menu.
            rebuild: function () {
                this.$ul.html('');

                // Remove select all option in select.
                $('option[value="' + this.options.selectAllValue + '"]', this.$select).remove();

                // Important to distinguish between radios and checkboxes.
                this.options.multiple = this.$select.attr('multiple') == "multiple";

                this.buildSelectAll();
                this.buildDropdownOptions();
                this.updateButtonText();
                this.buildFilter();
            },

            // Build select using the given data as options.
            dataprovider: function (dataprovider) {
                var optionDOM = "";
                dataprovider.forEach(function (option) {
                    optionDOM += '<option value="' + option.value + '">' + option.label + '</option>';
                });

                this.$select.html(optionDOM);
                this.rebuild();
            },

            // Enable button.
            enable: function () {
                this.$select.prop('disabled', false);
                this.$button.prop('disabled', false)
                        .removeClass('disabled');
            },

            // Disable button.
            disable: function () {
                this.$select.prop('disabled', true);
                this.$button.prop('disabled', true)
                        .addClass('disabled');
            },

            // Set options.
            setOptions: function (options) {
                this.options = this.mergeOptions(options);
            },

            // Get options by merging defaults and given options.
            mergeOptions: function (options) {
                return $.extend({}, this.defaults, options);
            },

            // Update button text and button title.
            updateButtonText: function () {
                var options = this.getSelected();

                // First update the displayed button text.
                $('button', this.$container).html(this.options.buttonText(options, this.$select));

                // Now update the title attribute of the button.
                $('button', this.$container).attr('title', this.options.buttonTitle(options, this.$select));

            },

            // Get all selected options.
            getSelected: function () {
                return $('option[value!="' + this.options.selectAllValue + '"]:selected', this.$select).filter(function () {
                    return $(this).prop('selected');
                });
            },

            // Get the corresponding option by ts value.
            getOptionByValue: function (value) {
                return $('option', this.$select).filter(function () {
                    return $(this).val() == value;
                });
            },

            // Get an input in the dropdown by its value.
            getInputByValue: function (value) {
                return $('li input', this.$ul).filter(function () {
                    return $(this).val() == value;
                });
            },

            updateOriginalOptions: function () {
                this.originalOptions = this.$select.clone()[0].options;
            },

            asyncFunction: function (callback, timeout, self) {
                var args = Array.prototype.slice.call(arguments, 3);
                return setTimeout(function () {
                    callback.apply(self || window, args);
                }, timeout);
            }
        };

        $.fn.multiselect = function (option, parameter) {
            return this.each(function () {
                var data = $(this).data('multiselect'), options = typeof option == 'object' && option;

                // Initialize the multiselect.
                if (!data) {
                    $(this).data('multiselect', (data = new Multiselect(this, options)));
                }

                // Call multiselect method.
                if (typeof option == 'string') {
                    data[option](parameter);
                }
            });
        };

        $.fn.multiselect.Constructor = Multiselect;

        // Automatically init selects by their data-role.
        $(function () {

            $("select[role='multiselect']").multiselect(
                    
                 { maxHeight: 300 },
         );
            

        });

        $('#related_news').ready(function () {
            
           
            var type = $('#type').val();
            if (type) {
                $.ajax({
                    type: "GET",
                    url: "{{route('ajax.relatednews.index')}}?type=" + type,
                    success: function (res) {
                        if (res) {
                            $("#related_news").empty();
                            $("#related-news").append('<option>new option</option>');
                            $.each(res, function (key, newsObj) {
                              
                                $("#related_news").append('<option value="' + newsObj.main_title + '">' + newsObj.main_title + '</option>');
                            });
                           
                            $("select[role='multiselect']").multiselect('rebuild');


                        } else {
                            $("#related_news").empty();


                        }
                    }})

            }

        })
                ;
                
        
$('#type').change(function () {
    var type = $('#type').val();
    if (type) {
        $.ajax({
            type: "GET",
            url: "{{ route('ajax.relatednews.index') }}?type=" + type,
            success: function (res) {
                if (res) {
                    $("#related_news").empty();
                    $("#related-news").append('<option>new option</option>');
                    $.each(res, function (key, newsObj) {
                      
                        $("#related_news").append('<option value="' + newsObj.main_title + '">' + newsObj.main_title + '</option>');
                    });
                    
                    $("select[role='multiselect']").multiselect('rebuild');


                } else {
                    $("#related_news").empty();


                }
            }
        })
    }
});




                
                
                


        $('#related_news').change(function () {
       
            var selectedOptions = $('#related_news option:selected');
           if (selectedOptions.length >= 5) {
                // Disable all other checkboxes.
                var nonSelectedOptions = $('#related_news option').filter(function () {
                    return !$(this).is(':selected');
                });

                nonSelectedOptions.each(function () {
                    var input = $('input[value="' + $(this).val() + '"]');
                    input.prop('disabled', true);
                    input.parent('li').addClass('disabled');
                });
            } else {
                // Enable all checkboxes.
                $('#related_news option').each(function () {
                    var input = $('input[value="' + $(this).val() + '"]');
                    input.prop('disabled', false);
                    input.parent('li').addClass('disabled');
                });
            }
        }
        );





    }(window.jQuery);




</script>

<script>


    $('#type').change(function () {
        var type = $('#type').val();
        if (type) {
            $.ajax({
                type: "GET",
                url: "{{route('ajax.authors.index')}}?type=" + type,
                success: function (res) {

                    if (res) {
                        $("#writer_id").empty();
                        $.each(res, function (key, authorsObj) {
                          
                            $("#writer_id").append('<option value="' + authorsObj.id + '">' + authorsObj.first_name + ' ' + authorsObj.last_name + '</option>');
                        });
                    } else {
                        $("#writer_id").empty();


                    }
                }})

        }

    });


 $('#writer_id').ready(function () {
      
        var type = $('#type').val();
        if (type) {
            $.ajax({
                type: "GET",
                url: "{{route('ajax.authors.index')}}?type=" + type,
                success: function (res) {

                    if (res) {
                        $("#writer_id").empty();
                        $.each(res, function (key, authorsObj) {
//                            console.log(authorsObj.first_name + ' ' + authorsObj.last_name);
                            $("#writer_id").append('<option value="' + authorsObj.id + '">' + authorsObj.first_name + ' ' + authorsObj.last_name + '</option>');
                        });
                    } else {
                        $("#writer_id").empty();


                    }
                }})

        }

    });
    
    
    
    
   
    
    $('#content').ready(function () {
        
     
        
    ClassicEditor
    .create( document.querySelector( '#content' ),{
        
        ckfinder: {
        uploadUrl: '{{route('store.media', ['_token' => csrf_token() ])}}',
        
    }
      
      
    } )
    .then( editor => {
      
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
    
    });
    
   
//   $("#file").Dropzone({ url: "/news" });

function deleteImage(id) {
   console.log('test');
   console.log($(this));
   
  
   $.ajax(
    {
        url: "/ajax/deleteimage/"+id,
        type: 'DELETE',
        data: { _token: '{{csrf_token()}}' },
        
      
        success: function (){
            console.log("it Works");
           $('#img_'+id).remove();
           console.log('[name="' + 'dlt_'+id + '"]');
           $('[name="' + 'dlt_'+id + '"]').remove();
           
            
        }
    });
   
    };


</script>



<script src="{{asset('styles/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')}}"></script>
<script src="{{asset('styles/@ckeditor/ckeditor5-upload/src/adapters/simpleuploadadapter.js')}}"></script>
<script src="{{asset('styles/dist/dropzone.js')}}"></script>
<script> 
    var files = [];
    Dropzone.autoDiscover = false;  
$(document).ready(function () {
    
    $("#dZUpload").dropzone({
        paramName: "file",
        url: "/storemedia",
        addRemoveLinks: true,
        autoProcessQueue: true,
        acceptedFiles: 'image/*',
        maxFiles: 10,
        
        init: function () {
            
             dzClosure = this;
             
    
             
            this.on('sending', function(file, xhr, formData){
            formData.append("_token", "{{ csrf_token() }}");
            
            this.on("removedfile", function(file) {
                
                console.log(file);

              });
        });
        
    

    },
        success: function (file, response) {
            files.push(response);
           console.log(files[0]);
           $('#media').val(files);
           console.log($('#media').val());
        },
        error: function (file, response) {
            file.previewElement.classList.add("dz-error");
        }
    });
});
</script>





    
    









@endsection









