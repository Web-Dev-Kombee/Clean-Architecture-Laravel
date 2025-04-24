<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Data Entry Form</title>
    <style>
        /* Basic Reset & Body Styling */
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f7f6; /* Slightly different background for form page */
            padding: 20px;
        }

        /* Container for the form */
        .form-container {
            max-width: 700px;
            margin: 30px auto;
            padding: 30px;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1, h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 25px;
        }

        h2 {
            margin-top: 30px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }

        /* Form Group Styling */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="tel"],
        .form-group input[type="url"],
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1em;
            color: #333;
        }

        .form-group textarea {
            min-height: 100px;
            resize: vertical; /* Allow vertical resizing */
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
        }

        /* Styling for repeatable sections */
        fieldset {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 25px;
            background-color: #fdfdfd;
        }

        legend {
            font-weight: bold;
            color: #3498db;
            padding: 0 10px;
            font-size: 1.1em;
        }

        /* Button Styling */
        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 15px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #2980b9;
        }

        /* Simple layout for details like date/location */
        .details-group {
            display: flex;
            gap: 15px;
        }

        .details-group .form-group {
            flex: 1; /* Make items share space */
        }

        /* Note for repeatable sections */
        .repeatable-note {
            font-size: 0.9em;
            color: #777;
            margin-top: -10px;
            margin-bottom: 15px;
            text-align: center;
        }

    </style>
</head>
<body>
    <div class="form-container">
        <h1>Resume Builder Form</h1>

        <form id="resumeForm"> <!-- Add action="your_server_script.php" method="post" for actual submission -->

            <!-- Header / Contact Info -->
            <h2>Contact Information</h2>
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" placeholder="e.g., Jane Doe" required>
            </div>
            <div class="form-group">
                <label for="role">Role You Are Applying For:</label>
                <input type="text" id="role" name="role" placeholder="e.g., Software Engineer">
            </div>
             <div class="details-group">
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="tel" id="phone" name="phone" placeholder="e.g., (555) 123-4567">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="e.g., jane.doe@example.com" required>
                </div>
            </div>
            <div class="details-group">
                 <div class="form-group">
                    <label for="linkedin">LinkedIn/Portfolio URL:</label>
                    <input type="url" id="linkedin" name="linkedin" placeholder="e.g., https://linkedin.com/in/janedoe">
                </div>
                <div class="form-group">
                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location" placeholder="e.g., City, State">
                </div>
            </div>

            <!-- Profile Section -->
            <h2>Profile Summary</h2>
            <div class="form-group">
                <label for="profile">Profile:</label>
                <textarea id="profile" name="profile" placeholder="Briefly explain why you're a great fit for the role..."></textarea>
            </div>

            <!-- Professional Experience Section -->
            <h2>Professional Experience</h2>
            <p class="repeatable-note">(Add details for your most recent role. Add more sections as needed programmatically or copy/paste this fieldset in HTML).</p>
            <fieldset>
                <legend>Job 1</legend>
                <div class="form-group">
                    <label for="job_title_1">Job Title:</label>
                    <input type="text" id="job_title_1" name="job_title[]" placeholder="e.g., Senior Developer">
                </div>
                <div class="form-group">
                    <label for="company_name_1">Company Name:</label>
                    <input type="text" id="company_name_1" name="company_name[]" placeholder="e.g., Tech Solutions Inc.">
                </div>
                <div class="details-group">
                    <div class="form-group">
                        <label for="job_dates_1">Date Period:</label>
                        <input type="text" id="job_dates_1" name="job_dates[]" placeholder="e.g., Jan 2020 - Present or May 2018 - Dec 2019">
                    </div>
                    <div class="form-group">
                        <label for="job_location_1">Location:</label>
                        <input type="text" id="job_location_1" name="job_location[]" placeholder="e.g., City, State">
                    </div>
                </div>
                 <div class="form-group">
                    <label for="company_description_1">Company Description (Optional):</label>
                    <textarea id="company_description_1" name="company_description[]" placeholder="Brief description of the company (optional)"></textarea>
                </div>
                <div class="form-group">
                    <label for="accomplishments_1">Accomplishments:</label>
                    <textarea id="accomplishments_1" name="accomplishments[]" placeholder="Highlight your accomplishments, using numbers if possible. Use bullet points (e.g., start each line with * or -)"></textarea>
                </div>
            </fieldset>
            <!-- Add more fieldsets for Job 2, Job 3 etc. here if needed statically -->
            <!-- A button to dynamically add more sections would require JavaScript -->

            <!-- Education Section -->
            <h2>Education</h2>
             <p class="repeatable-note">(Add details for your most relevant education. Add more sections as needed).</p>
             <fieldset>
                <legend>Education 1</legend>
                 <div class="form-group">
                    <label for="degree_1">Degree and Field of Study:</label>
                    <input type="text" id="degree_1" name="degree[]" placeholder="e.g., Bachelor of Science in Computer Science">
                </div>
                 <div class="form-group">
                    <label for="school_1">School or University:</label>
                    <input type="text" id="school_1" name="school[]" placeholder="e.g., State University">
                </div>
                 <div class="form-group">
                    <label for="education_dates_1">Date Period:</label>
                    <input type="text" id="education_dates_1" name="education_dates[]" placeholder="e.g., Aug 2014 - May 2018 or Graduated May 2018">
                </div>
             </fieldset>
             <!-- Add more education fieldsets here if needed -->

            <!-- Certification Section -->
            <h2>Certifications</h2>
            <p class="repeatable-note">(Add details for relevant certifications. Add more sections as needed).</p>
            <fieldset>
                <legend>Certification 1</legend>
                 <div class="form-group">
                    <label for="certificate_name_1">Certificate Name:</label>
                    <input type="text" id="certificate_name_1" name="certificate_name[]" placeholder="e.g., AWS Certified Developer - Associate">
                </div>
                <div class="form-group">
                    <label for="issuing_info_1">Issuing Institution and Date:</label>
                    <input type="text" id="issuing_info_1" name="issuing_info[]" placeholder="e.g., Amazon Web Services, Issued June 2021">
                </div>
            </fieldset>
            <!-- Add more certification fieldsets here if needed -->

             <!-- Technical Skills Section -->
            <h2>Technical Skills</h2>
            <div class="form-group">
                <label for="skills">Skills:</label>
                <textarea id="skills" name="skills" placeholder="List your technical skills, separated by commas or on new lines (e.g., JavaScript, Python, React, SQL, AWS)"></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit">Generate Resume / Save Data</button>

        </form>
    </div> <!-- End form-container -->
</body>
</html>