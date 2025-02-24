<?php

function scores()
{
	// Check if match went to Walkover
	$walkover = get_field('walkover');
	$walkover_winner = get_field('walkover_winner');

	if ($walkover) {
		echo '<hr>';
		if ($walkover_winner === 'kampbart') {
			echo '<p>Motstander møter ikke opp.<br> <strong>Kampbart vinner på walkover.</strong></p>';
		} else {
			echo '<p>Kampbart møter ikke opp.<br> <strong>Motstander vinner på walkover</strong></p>';
		}
	} else {
		// Get home and away team field
		// Returns object

		$home_team = get_field('home_team');
		$away_team = get_field('away_team');

		// Get post_name
		$home_team = $home_team[0]->post_name;
		$away_team = $away_team[0]->post_name;

		// Who is home team?
		// Set variable accordingly

		if ($home_team === 'kampbart') {
			$kampbart_away = $away_team;
			$opponent_away = $away_team;
		} else {
			$kampbart_home = $home_team;
			$opponent_home = $home_team;
		}

		if (get_field('goals_assists_first_half')) {

			echo '<ul>';

			$kampbart_goals_first_half = 0;
			$opponent_goals_first_half = 0;

			while (has_sub_field('goals_assists_first_half')) {

				$goals_for = get_sub_field('goal_for');

				if ($goals_for === 'kampbart') {
					$kampbart_goals_first_half++;
				} else {
					$opponent_goals_first_half++;
				}

				// Set goalscore
				// I need to check who's home and who's away again

				echo '<li>';

				if ($home_team === 'kampbart') {
					// echo 'Kampbart er hjemmelag';
					echo $kampbart_goals_first_half . '–' . $opponent_goals_first_half;
				} else {
					echo $opponent_goals_first_half . '–' . $kampbart_goals_first_half;
				}

				if (!empty($goals_for) && $goals_for === 'kampbart') {

					$goal = get_sub_field('goal_scorer_first_half');
					if (!empty($goal)) {

						$player = esc_html(get_the_title($goal->ID));
						$player_page = esc_url(get_permalink($goal->ID));

						echo ' &ndash; <a href="' . $player_page . '">' . $player . '</a>';
					} else {
						echo ' – ' . 'Own goal'; // Translate this and concatenate
					}

					$assist = get_sub_field('assist_first_half');
					$assist_text = get_sub_field('assist_first_half_text');
					if (!empty($assist)) {

						$player = esc_html(get_the_title($assist->ID));
						$player_page = esc_url(get_permalink($assist->ID));

						echo ' (<a href="' . $player_page . '">' . $player . '</a>)';
					} elseif (!empty($assist_text) && ($assist_text !== 'player_assist')) {
						echo ' (' . esc_html($assist_text) . ')';
					} else {
						echo '';
					}

					echo '</li>';
				}
			}

			echo '</ul>';

			$kampbart_goals_pause = $kampbart_goals_first_half;
			$opponent_goals_pause = $opponent_goals_first_half;
		}

		echo '<hr>';

		if (get_field('goals_assists_second_half')) {

			echo '<ul>';

			if (get_field('goals_assists_first_half') === false) {
				$kampbart_goals_second_half = 0;
				$opponent_goals_second_half = 0;
			} else {
				$kampbart_goals_second_half = $kampbart_goals_pause;
				$opponent_goals_second_half = $opponent_goals_pause;
			}


			while (has_sub_field('goals_assists_second_half')) {

				$goals_for = get_sub_field('goal_for');

				if ($goals_for === 'kampbart') {
					$kampbart_goals_second_half++;
				} else {
					$opponent_goals_second_half++;
				}

				// Set goalscore
				// I need to check who's home and who's away again

				echo '<li>';

				if ($home_team === 'kampbart') {
					echo $kampbart_goals_second_half . '–' . $opponent_goals_second_half;
				} else {
					echo $opponent_goals_second_half . '–' . $kampbart_goals_second_half;
				}

				if (!empty($goals_for) && $goals_for === 'kampbart') {

					$goal = get_sub_field('goal_scorer_second_half');
					if (!empty($goal)) {

						$player = esc_html(get_the_title($goal->ID));
						$player_page = esc_url(get_permalink($goal->ID));

						echo ' &ndash; <a href="' . $player_page . '">' . $player . '</a>';
					} else {
						echo ' – ' . 'Own goal'; // Translate this and concatenate
					}

					$assist = get_sub_field('assist_second_half');
					$assist_text = get_sub_field('assist_second_half_text');
					if (!empty($assist)) {

						$player = esc_html(get_the_title($assist->ID));
						$player_page = esc_url(get_permalink($assist->ID));

						echo ' (<a href="' . $player_page . '">' . $player . '</a>)';
					} elseif (!empty($assist_text) && ($assist_text !== 'player_assist')) {
						echo ' (' . esc_html($assist_text) . ')';
					} else {
						echo '';
					}

					echo '</li>';
				}
			}

			// This just stores the two teams final score into a variable for each
			// Don't know if I really need this for anything though
			$kampbart_goals_final_score = $kampbart_goals_second_half;
			$opponent_goals_final_score = $opponent_goals_second_half;

			echo '</ul>';
		}
	}

}
