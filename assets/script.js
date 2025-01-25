// To calculate the score from questionnaire
window.getResult = function($data, $score) {
    let result = [];
    result['title'] = "Your responses on " + $data.survey_acronym + ": " + $data.survey_name + " Risk Assessment were successfully submitted. " + $data.lang;

    if($data.lang == 'eng') {
        const hiSuggestion = "We strongly suggest that you seek medical assistance (including Ear, Nose and Throat examination) from relevant medical specialist(s) as soon as possible to get further professional advice, and proper diagnosis. It is necessary that you consider quarterly to half yearly medical check up.";
        const middleSuggestion = "While you may be healthy now, it is advisable that you go for regular medical check up. It pays to have a healthy lifestyle too.";
        const loSuggestion = "However, it is still good to live a healthy lifestyle, and go for regular medical check up.";
        
        // $score = 37;
        // BreCRA
        if($data.survey_id == 6) {
            if($score <= 20) {
                result['risk'] = "Low Risk";
                result['rating'] = "low";
                result['suggestion'] = loSuggestion;
                result['badge'] = "text-bg-success";
            }
            else if($score >= 21 && $score <= 31) {
                result['risk'] = "Moderate Risk";
                result['rating'] = "low to moderate";
                result['suggestion'] = middleSuggestion;
                result['badge'] = "text-bg-warning";
            }
            else {
                result['risk'] = "High Risk";
                result['rating'] = "moderate to high";
                result['suggestion'] = hiSuggestion;
                result['badge'] = "text-bg-danger";
            }
            result['desc'] = $data.survey_acronym + " indicate a <mark>" + result['rating'] + " " + $data.survey_name + " risk.</mark> Score: " + $score;
        }

        // NasoCRA
        else if($data.survey_id == 7) {
            if($score <= 18) {
                result['risk'] = "Low Risk";
                result['rating'] = "low";
                result['suggestion'] = loSuggestion;
                result['badge'] = "text-bg-success";
            }
            else if($score >= 19 && $score <= 36) {
                result['risk'] = "Moderate Risk";
                result['rating'] = "low to moderate";
                result['suggestion'] = middleSuggestion;
                result['badge'] = "text-bg-warning";
            }
            else {
                result['risk'] = "High Risk";
                result['rating'] = "moderate to high";
                result['suggestion'] = hiSuggestion;
                result['badge'] = "text-bg-danger";
            }
            result['desc'] = $data.survey_acronym + " indicate a <mark>" + result['rating'] + " " + $data.survey_name + " risk.</mark> Score: " + $score;
        }
        // LunCRA
        else if($data.survey_id == 8) {
            if($score <= 20) {
                result['risk'] = "Low Risk";
                result['rating'] = "low";
                result['suggestion'] = loSuggestion;
                result['badge'] = "text-bg-success";
            }
            else if($score >= 21 && $score <= 37) {
                result['risk'] = "Moderate Risk";
                result['rating'] = "low to moderate";
                result['suggestion'] = middleSuggestion;
                result['badge'] = "text-bg-warning";
            }
            else {
                result['risk'] = "High Risk";
                result['rating'] = "moderate to high";
                result['suggestion'] = hiSuggestion;
                result['badge'] = "text-bg-danger";
            }
            result['desc'] = $data.survey_acronym + " indicate a <mark>" + result['rating'] + " " + $data.survey_name + " risk.</mark> Score: " + $score;
        }

        // ColoCRA
        else if($data.survey_id == 9) {
            if($score <= 26) {
                result['risk'] = "Low Risk";
                result['rating'] = "low";
                result['suggestion'] = loSuggestion;
                result['badge'] = "text-bg-success";
            }
            else if($score >= 27 && $score <= 38) {
                result['risk'] = "Moderate Risk";
                result['rating'] = "low to moderate";
                result['suggestion'] = middleSuggestion;
                result['badge'] = "text-bg-warning";
            }
            else {
                result['risk'] = "High Risk";
                result['rating'] = "moderate to high";
                result['suggestion'] = hiSuggestion;
                result['badge'] = "text-bg-danger";
            }
            result['desc'] = $data.survey_acronym + " indicate a <mark>" + result['rating'] + " " + $data.survey_name + " risk.</mark> Score: " + $score;
        }

        // CerviCRA
        else if($data.survey_id == 10) {
            if($score <= 20) {
                result['risk'] = "Low Risk";
                result['rating'] = "low";
                result['suggestion'] = loSuggestion;
                result['badge'] = "text-bg-success";
            }
            else if($score >= 21 && $score <= 30) {
                result['risk'] = "Moderate Risk";
                result['rating'] = "low to moderate";
                result['suggestion'] = middleSuggestion;
                result['badge'] = "text-bg-warning";
            }
            else {
                result['risk'] = "High Risk";
                result['rating'] = "moderate to high";
                result['suggestion'] = hiSuggestion;
                result['badge'] = "text-bg-danger";
            }
            result['desc'] = $data.survey_acronym + " indicate a <mark>" + result['rating'] + " " + $data.survey_name + " risk.</mark> Score: " + $score;
        }
	}
    else if($data.lang == 'malay') {
        const hiSuggestion = "Kami amat menyarankan agar anda mendapatkan bantuan perubatan (termasuk pemeriksaan Telinga, Hidung dan Tekak) daripada pakar perubatan yang berkaitan secepat mungkin untuk mendapatkan nasihat profesional lanjut, dan diagnosis yang betul. Anda juga digalakkan untuk melakukan pemeriksaan kesihatan dua ke empat kali setahun.";
        const middleSuggestion = "Walaupun anda mungkin sihat sekarang, anda dinasihatkan untuk menjalani pemeriksaan kesihatan secara berkala.";
        const loSuggestion = "Walau bagaimanapun, anda digalakkan untuk menjalani gaya hidup sihat, dan menjalani pemeriksaan kesihatan secara berkala.";
        
        // BreCRA
        if($data.survey_id == 6) {
            let nama_survey = "Kanser Payudara";
            if($score <= 20) {
                result['risk'] = "Risiko Rendah";
                result['rating'] = "rendah";
                result['suggestion'] = loSuggestion;
                result['badge'] = "text-bg-success";
            }
            else if($score >= 21 && $score <= 31) {
                result['risk'] = "Risiko Sederhana";
                result['rating'] = "rendah ke sederhana";
                result['suggestion'] = middleSuggestion;
                result['badge'] = "text-bg-warning";
            }
            else {
                result['risk'] = "Risiko Tinggi";
                result['rating'] = "sederhana ke tinggi";
                result['suggestion'] = hiSuggestion;
                result['badge'] = "text-bg-danger";
            }
            result['desc'] = $data.survey_acronym + " menunjukkan <mark>risiko " + nama_survey + " yang " + result['rating'] + "</mark>.";
        }

        // nasoCRA
        if($data.survey_id == 7) {
            let nama_survey = "NPC";
            if($score <= 18) {
                result['risk'] = "Risiko Rendah";
                result['rating'] = "rendah";
                result['suggestion'] = loSuggestion;
                result['badge'] = "text-bg-success";
            }
            else if($score >= 19 && $score <= 36) {
                result['risk'] = "Risiko Sederhana";
                result['rating'] = "rendah ke sederhana";
                result['suggestion'] = middleSuggestion;
                result['badge'] = "text-bg-warning";
            }
            else {
                result['risk'] = "Risiko Tinggi";
                result['rating'] = "sederhana ke tinggi";
                result['suggestion'] = hiSuggestion;
                result['badge'] = "text-bg-danger";
            }
            result['desc'] = $data.survey_acronym + " menunjukkan <mark>risiko " + nama_survey + " yang " + result['rating'] + "</mark>.";
        }

        // LunCra
        if($data.survey_id == 8) {
            let nama_survey = "Kanser Paru-Paru";
            if($score <= 20) {
                result['risk'] = "Risiko Rendah";
                result['rating'] = "rendah";
                result['suggestion'] = loSuggestion;
                result['badge'] = "text-bg-success";
            }
            else if($score >= 21 && $score <= 37) {
                result['risk'] = "Risiko Sederhana";
                result['rating'] = "rendah ke sederhana";
                result['suggestion'] = middleSuggestion;
                result['badge'] = "text-bg-warning";
            }
            else {
                result['risk'] = "Risiko Tinggi";
                result['rating'] = "sederhana ke tinggi";
                result['suggestion'] = hiSuggestion;
                result['badge'] = "text-bg-danger";
            }
            result['desc'] = $data.survey_acronym + " menunjukkan <mark>risiko " + nama_survey + " yang " + result['rating'] + "</mark>.";
        }

        // ColoCRA
        if($data.survey_id == 9) {
            let nama_survey = "Kanser Kolon";
            if($score <= 26) {
                result['risk'] = "Risiko Rendah";
                result['rating'] = "rendah";
                result['suggestion'] = loSuggestion;
                result['badge'] = "text-bg-success";
            }
            else if($score >= 27 && $score <= 38) {
                result['risk'] = "Risiko Sederhana";
                result['rating'] = "rendah ke sederhana";
                result['suggestion'] = middleSuggestion;
                result['badge'] = "text-bg-warning";
            }
            else {
                result['risk'] = "Risiko Tinggi";
                result['rating'] = "sederhana ke tinggi";
                result['suggestion'] = hiSuggestion;
                result['badge'] = "text-bg-danger";
            }
            result['desc'] = $data.survey_acronym + " menunjukkan <mark>risiko " + nama_survey + " yang " + result['rating'] + "</mark>.";
        }

        // CerviCRA
        if($data.survey_id == 10) {
            let nama_survey = "Kanser Serviks";
            if($score <= 20) {
                result['risk'] = "Risiko Rendah";
                result['rating'] = "rendah";
                result['suggestion'] = loSuggestion;
                result['badge'] = "text-bg-success";
            }
            else if($score >= 21 && $score <= 30) {
                result['risk'] = "Risiko Sederhana";
                result['rating'] = "rendah ke sederhana";
                result['suggestion'] = middleSuggestion;
                result['badge'] = "text-bg-warning";
            }
            else {
                result['risk'] = "Risiko Tinggi";
                result['rating'] = "sederhana ke tinggi";
                result['suggestion'] = hiSuggestion;
                result['badge'] = "text-bg-danger";
            }
            result['desc'] = $data.survey_acronym + " menunjukkan <mark>risiko " + nama_survey + " yang " + result['rating'] + "</mark>.";
        }
    }
    else if($data.lang == 'mandarin') {
        
    }
    else if($data.lang == 'iban') {
        const hiSuggestion = "Nuan patut betemu enggau bala sida lutor enggau jampat awakka ulih didiagnosis, diperesa (beperesa pending, idung enggau rekung) sereta diperubat. Nuan patut beperesa pengerai tetiap suku taun tauka setengah taun sekali.";
        const middleSuggestion = "Taja pan nuan ngasaika diri bepengerai, Nuan patut mega beperesa pengerai.";
        const loSuggestion = "Taja pia, manah agi enti idup enggau chara engkeman (healthy lifestyle), sereta suah beperesa pengerai.";
        
        // BreCRA
        if($data.survey_id == 6) {
            let nama_survey = "Kanser Tusu";
            if($score <= 20) {
                result['risk'] = "Risiko: Baruh";
                result['rating'] = "ti baruh";
                result['suggestion'] = loSuggestion;
                result['badge'] = "text-bg-success";
            }
            else if($score >= 21 && $score <= 31) {
                result['risk'] = "Risiko: Sedang";
                result['rating'] = "ari baruh ke sedang";
                result['suggestion'] = middleSuggestion;
                result['badge'] = "text-bg-warning";
            }
            else {
                result['risk'] = "Risiko: Tinggi";
                result['rating'] = "ari sedang ke tinggi";
                result['suggestion'] = hiSuggestion;
                result['badge'] = "text-bg-danger";
            }
            result['desc'] = $data.survey_acronym + " nunjukka <mark>risiko " + nama_survey + result['rating'] + "</mark>.";
        }

        // nasoCRA
        if($data.survey_id == 7) {
            let nama_survey = "NPC";
            if($score <= 18) {
                result['risk'] = "Risiko: Baruh";
                result['rating'] = "ti baruh";
                result['suggestion'] = loSuggestion;
                result['badge'] = "text-bg-success";
            }
            else if($score >= 19 && $score <= 36) {
                result['risk'] = "Risiko: Sedang";
                result['rating'] = "ari baruh ke sedang";
                result['suggestion'] = middleSuggestion;
                result['badge'] = "text-bg-warning";
            }
            else {
                result['risk'] = "Risiko: Tinggi";
                result['rating'] = "ari sedang ke tinggi";
                result['suggestion'] = hiSuggestion;
                result['badge'] = "text-bg-danger";
            }
            result['desc'] = $data.survey_acronym + " nunjukka <mark>risiko " + nama_survey + result['rating'] + "</mark>.";
        }

        // LunCRA
        if($data.survey_id == 8) {
            let nama_survey = "Kanser Lempuang";
            if($score <= 20) {
                result['risk'] = "Risiko: Baruh";
                result['rating'] = "ti baruh";
                result['suggestion'] = loSuggestion;
                result['badge'] = "text-bg-success";
            }
            else if($score >= 21 && $score <= 37) {
                result['risk'] = "Risiko: Sedang";
                result['rating'] = "ari baruh ke sedang";
                result['suggestion'] = middleSuggestion;
                result['badge'] = "text-bg-warning";
            }
            else {
                result['risk'] = "Risiko: Tinggi";
                result['rating'] = "ari sedang ke tinggi";
                result['suggestion'] = hiSuggestion;
                result['badge'] = "text-bg-danger";
            }
            result['desc'] = $data.survey_acronym + " nunjukka <mark>risiko " + nama_survey + result['rating'] + "</mark>.";
        }

        // ColoCRA
        if($data.survey_id == 9) {
            let nama_survey = "Kanser Kolon";
            if($score <= 26) {
                result['risk'] = "Risiko: Baruh";
                result['rating'] = "ti baruh";
                result['suggestion'] = loSuggestion;
                result['badge'] = "text-bg-success";
            }
            else if($score >= 27 && $score <= 38) {
                result['risk'] = "Risiko: Sedang";
                result['rating'] = "ari baruh ke sedang";
                result['suggestion'] = middleSuggestion;
                result['badge'] = "text-bg-warning";
            }
            else {
                result['risk'] = "Risiko: Tinggi";
                result['rating'] = "ari sedang ke tinggi";
                result['suggestion'] = hiSuggestion;
                result['badge'] = "text-bg-danger";
            }
            result['desc'] = $data.survey_acronym + " nunjukka <mark>risiko " + nama_survey + result['rating'] + "</mark>.";
        }

        // CerviCRA
        if($data.survey_id == 10) {
            let nama_survey = "Kanser Serviks";
            if($score <= 20) {
                result['risk'] = "Risiko: Baruh";
                result['rating'] = "ti baruh";
                result['suggestion'] = loSuggestion;
                result['badge'] = "text-bg-success";
            }
            else if($score >= 21 && $score <= 30) {
                result['risk'] = "Risiko: Sedang";
                result['rating'] = "ari baruh ke sedang";
                result['suggestion'] = middleSuggestion;
                result['badge'] = "text-bg-warning";
            }
            else {
                result['risk'] = "Risiko: Tinggi";
                result['rating'] = "ari sedang ke tinggi";
                result['suggestion'] = hiSuggestion;
                result['badge'] = "text-bg-danger";
            }
            result['desc'] = $data.survey_acronym + " nunjukka <mark>risiko " + nama_survey + result['rating'] + "</mark>.";
        }
    }
	uni_modal(result['title'], "result.php", "large", result)
}


function showMore(n) {
    const texts = document.querySelectorAll('#showMore');

    texts[n].style.display = 'none';
}