<div class="signup-form1-div">
                        <div class="form-group">
                            <input class="form-control" type="text" id="first_name" onchange="firstNameValidate();" name="first_name" placeholder="First Name" required>
                        </div>
                        <div class="form-group">
                        <input class="form-control" type="text" id="last_name" onchange="lastNameValidate();" name="last_name" placeholder="Last Name" required>

                        </div>
                    </div>
                    
                    <div class="signup-form1-div">
                        <div class="form-group">
                            <input class="form-control" type="text" name="name" placeholder="User Name" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="email" onchange="emailValidate();" name="email" placeholder="Email Address" required>
                        </div>
                    </div>
                    
                    <div class="signup-form1-div">
                        <div class="form-group">
                            <input class="form-control" type="password" onchange="passwordValidate();" id="password" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" name="cpassword" placeholder="Confirm password" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <input id="signin-dob" class="form-control" type="date" name="date" placeholder="Date Of Birth" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="label">Gender</label>
                        <select style="margin-left: 10px" name="gender">
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                            <option value="o">Other</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                <label for="file">Choose Image:</label>
                <input type="file" class="form-control-file" name="img_file" id="file" required>
            </div>

                    <div class="form-group" style="display: flex; flex-direction: column;">
                        <label>Address</label>
                        <textarea cols="35" rows="2" name="address" style="margin-left: 10px" value="address"></textarea>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="text" name="State" placeholder="State">
                    </div>

                <div class="signup-form1-div">
                    <div class="form-group">
                        <input class="form-control" type="number" name="Pin" maxlength="6" placeholder="Pin Code">
                    </div>
                    <div class="form-group" style="display: flex; margin-left: 40px">
                    <input class="form-control" type="text" name="country code" style="width: 50px;" value="+91" size="2"/>   
                    <input class="form-control" type="text" name="phone" placeholder="Phone Number" style="width: 200px;margin-left: 10px" size="10"/>
                    </div>
                </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="signup" value="Signup">
                    </div>
                    <div class="link login-link text-center">Already a Seller? <a href="login-user.php">Login here</a></div>
                </form>
            </div>
        </div>