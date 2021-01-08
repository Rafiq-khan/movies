                    <tr class="new_row_data">
                        <td>
                            <select name="type[]" data-val='{{$val}}' onchange="typeSel(this)" class="form-control border-class font-10  input_type" id="input_type" required="required" style="width: 100px;">
                                <option value="text">Text</option>
                                <option value="checkbox">Checkbox</option>
                                <option value="date">Date</option>
                                <option value="year">Year</option>
                                <option value="listitem">List Item</option>
                                <option value="select">SelectBox</option>
                                <option value="email">Email</option>
                                <option value="file">File</option>
                                <option value="number">Number</option>
                                <option value="password">Password</option>
                                <option value="radio">Radio</option>
                                <option value="textarea">Textarea</option>
                            </select>

                            <div id="radio_selection{{$val}}" style="margin-top: 10px;display: none;">
                                <label>Values </label>

                                <i style="margin-left: : 5px;cursor: pointer;" onclick="addRowradio(this)" class="zmdi zmdi-plus-circle add-radio-values" data-val='{{$val}}'></i>
                                <i style="margin-left: : 15px;cursor: pointer;" onclick="removeRowradio(this)" class="zmdi zmdi-minus-circle remove-radio-values" data-val='{{$val}}'></i>

                                <input type="text" name="radio{{$val}}[]" class="form-control border-class font-10 ">
                                <input type="text" name="radio{{$val}}[]" class="form-control border-class font-10 " style="margin-top: 10px;">
                            </div>

                            <div id="select_selection{{$val}}" style="margin-top: 10px;display: none;">
                                <label>Values </label>

                                <i style="margin-left: : 5px;cursor: pointer;" class="zmdi zmdi-plus-circle add-select-values" data-val='{{$val}}' onclick="addRowselect(this)">Plus</i>
                                <i style="margin-left: : 15px;cursor: pointer;" class="zmdi zmdi-minus-circle remove-select-values" data-val='{{$val}}' onclick="removeRowselect(this)">Minus</i>

                                <input type="text" name="select_option{{$val}}[]" class="form-control border-class font-10 ">
                            </div>

                            <div id="checkbox_selection{{$val}}" style="margin-top: 10px;display: none;">
                                <label>Values </label>

                                <i style="margin-left: : 5px;cursor: pointer;" class="zmdi zmdi-plus-circle add-checkbox-values" data-val='{{$val}}' onclick="addRowcheckbox(this)"></i>
                                <i style="margin-left: : 15px;cursor: pointer;" class="zmdi zmdi-minus-circle remove-checkbox-values" data-val='{{$val}}' onclick="removeRowcheckbox(this)"></i>

                                <input type="text" name="checkbox_option{{$val}}[]" class="form-control border-class font-10 ">
                            </div>

                        </td>

                        <td>
                            <input type="text" name="name[]" class="form-control border-class font-10  name" onkeyup="check_name()" required="required" style="width: 100px;">
                        </td>

                        <td>

                            <input type="text" name="label[]" class="form-control border-class font-10  label" required="required" style="width: 100px;">

                        </td>

                        <td>
                            <input type="text" name="id[]" class="form-control border-class font-10  id" onkeyup="check_id()" style="width: 100px;">
                        </td>

                        <td>
                            <input type="text" name="value[]" class="form-control border-class font-10 " style="width: 100px;">
                        </td>

                        <td>
                            <input type="text" name="placeholder[]" class="form-control border-class font-10 " style="width: 100px;">
                        </td>

                        <td>
                            <select name="required[]" class="form-control border-class font-10 " required="required" style="width: 100px;">
                                <option selected="selected" value="true">True</option>
                                <option value="false">False</option>
                            </select>
                        </td>

                        <td>
                            <select name="disable[]" class="form-control border-class font-10 " required="required" style="width: 100px;">
                                <option value="true">True</option>
                                <option selected="selected" value="false">false</option>
                            </select>
                        </td>

                        <td>
                            <select name="readonly[]" class="form-control border-class font-10 " required="required" style="width: 100px;">
                                <option value="true">True</option>
                                <option selected="selected" value="false">false</option>
                            </select>
                        </td>

                        <td>
                            <select name="show_to_user[]" class="form-control border-class font-10 " style="width: 100px;">
                                <option selected="selected" value="true">True</option>
                                <option value="false">false</option>
                            </select>
                        </td>

                        <td>
                            <select name="is_filter[]" class="form-control border-class font-10">
                                <option value="true">True</option>
                                <option selected="selected" value="false">false</option>
                            </select>
                        </td>


                    </tr>